<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Categori;
use Illuminate\Support\Facades\Auth;
use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Services\PlausibleService;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $userCount = User::where('role', 'admin')->count();
        $postCount = Post::where('status', 'public')->count();
        $tagcount = Tag::count();
        $categoryCount = Categori::count();
        $recentPosts = Post::where('status', 'public')
        ->orderBy('created_at', 'desc')
        ->take(15)
        ->get();

        return view('backend.index', compact('userCount','postCount','categoryCount','tagcount','recentPosts'));
    }

    public function getTopPages(PlausibleService $plausible, Request $request)
    {
        $property = $request->query('property', 'event:page');
        $period = $request->query('period', '7d');
    
        $stats = $plausible->getStats($period, $property);
    
        $topBrowsers = [];
    
        if (!empty($stats['results'])) {
            $topPages = array_slice($stats['results'], 0, 10);
    
            foreach ($topPages as $item) {
                $topBrowsers[] = [
                    'page' => $item['page'] ?? 'N/A',
                    'visitors' => $item['visitors'] ?? 0,
                ];
            }
        }
    
        return response()->json([
            'topBrowsers' => $topBrowsers,
        ]);
    }
    
    
    public function gettopBrowsers(PlausibleService $plausible, Request $request)
    {
        $period = $request->query('period', '7d');
        $property = $request->query('property', 'visit:source');

        $stats = $plausible->getStats($period, $property);  
        $topBrowsers = [];
    
        if (!empty($stats['results'])) {
            $topPages = array_slice($stats['results'], 0, 15);
    
            foreach ($topPages as $item) {
                $topBrowsers[] = [
                    'page' => $item['source'] ?? 'N/A',
                    'visitors' => $item['visitors'] ?? 0,
                ];
            }
        }
    
        return response()->json([
            'topBrowsers' => $topBrowsers,
        ]);
    }
    

    public function gettopReferrers(PlausibleService $plausible, Request $request){

        $period = $request->query('period', '7d');
        $property = $request->query('property', 'visit:referrer');

        $stats = $plausible->getStats($period, $property);  

        $topReferrers = [];
        if (!empty($stats['results'])) {
            $topPages = array_slice($stats['results'], 0, 15);
    
            foreach ($topPages as $item) {
                $topReferrers[] = [
                    'page' => $item['referrer'] ?? 'N/A',
                    'visitors' => $item['visitors'] ?? 0,
                ];
            }
        }

        return response()->json([
            'topReferrers' => $topReferrers,
        ]);
    }
    

    public function getSiteAnalytics(PlausibleService $plausible, Request $request)
    {
        $metrics = $request->query('metrics', 'visitors,pageviews,visits,bounce_rate');
        $period = $request->query('period', '7d');
        $periods = $request->query('period', '30d');
        $filters = $request->query('filters', 'visitors');

        $traff = $plausible->getTimeSeries($periods, $filters);
        $stats = $plausible->getMet($period, $metrics);
    
        $siteAnalytics = [];
        $trafficData = [];
    
        if (!empty($stats['results'])) {
            $siteAnalytics[] = [
                'sessions' => $stats['results']['visits']['value'] ?? 0,
                'bouncerate' => $stats['results']['bounce_rate']['value'] ?? 0,
                'pageviews' => $stats['results']['pageviews']['value'] ?? 0,
                'activeusers' => $stats['results']['visitors']['value'] ?? 0,
            ];
    
            if (!empty($traff['results'])) {
                foreach ($traff['results'] as $item) {
                    $trafficData[] = [
                        'date' => $item['date'],
                        'visitors' => $item['visitors'] ?? 0,
                    ];
                }
            }
        }
    
        return response()->json([
            'siteAnalytics' => $siteAnalytics,
            'trafficData' => $trafficData,
        ]);
    }
    
    
    

    public function exportDataPost()
    {
        $postCount = Post::count();
        return view('backend.pages.export.export-post.index',compact('postCount'));
    }

    public function exportPosts(Request $request)
    { 
        $request->validate([
        'columns' => 'required|array',
        'format' => 'required|in:csv,xlsx,json',
        ]);

        $columns = $request->input('columns');
        $format = $request->input('format');
    
        $posts = Post::with('kategori', 'tags')->get()->map(function ($post) use ($columns) {
            $data = [];
    
            foreach ($columns as $column) {
                if ($column === 'categories') {
                    $data['categories'] = $post->kategori->nama_kategori ?? '';
                } elseif ($column === 'tags') {
                    $data['tags'] = $post->tags->pluck('nama_tags')->join(', ');
                } else {
                    $data[$column] = $post->$column ?? '';
                }
            }
    
            return $data;
        });
    
        if ($format === 'json') {
            $filename = 'posts_' . now()->format('Y-m-d') . '.json';
            $jsonContent = $posts->toJson(JSON_PRETTY_PRINT);
        
            return response()->streamDownload(function () use ($jsonContent) {
                echo $jsonContent;
            }, $filename, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => "attachment; filename={$filename}",
            ]);
        }
        
        return Excel::download(new PostExport($columns), "posts_".now()->format('Y-m-d').".{$format}");
        
    }


    public function exportReport(Request $request)
    {
        $startDate = $request->start_date ? Carbon::parse($request->start_date)->startOfDay()->addSecond() : null;
        $endDate = $request->end_date ? Carbon::parse($request->end_date)->endOfDay() : null;
        $authorIds = $request->author_id;

        $users = User::query()
            ->withCount(['posts' => function ($query) use ($startDate, $endDate) {
                if ($startDate && $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }
            }]);

        if ($authorIds && !in_array('all', $authorIds)) {
            $users->whereIn('id', $authorIds);
        }

        $users = $users->orderBy('posts_count', 'desc')->get();

        return view('backend.pages.export.export-report.index', [
            'user' => $users,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_json' => json_encode($users),
        ]);
    }



    public function exportPdf(Request $request)
    {
        $users = json_decode($request->user, true);
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $pdf = Pdf::loadView('backend.pages.export.export-report.exportPdf', [
            'users' => $users,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
        return $pdf->download('report.pdf');
    }


    public function loginPage()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('backend.pages.auth.login');
    }


    public function searchLfm(Request $request){
        $query = strtolower($request->input('q'));
        $files = array_filter(Storage::disk('public')->allFiles(), function ($file) use ($query) {
            return stripos(basename($file), $query) !== false;
        });

        return view('vendor.laravel-filemanager.search-results', compact('files'));
    }
}
