<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function memberIndex(Request $request) {
        $query = User::query();
    
        $query->where('role', 'author'); 
    
        $allowedColumns = ['name', 'email']; 
        $allowedOperators = ['=', '>', '<', 'like'];
    
        if ($request->has('filter_columns')) {
            foreach ($request->input('filter_columns') as $index => $column) {
                $operator = $request->input('filter_operators')[$index] ?? '=';
                $value = $request->input('filter_values')[$index] ?? '';
            
                if (!in_array($column, $allowedColumns)) {
                    continue; 
                }
            
                if (!in_array($operator, $allowedOperators)) {
                    continue;
                }
            
                if (!empty($column) && !empty($value)) {
                    if ($operator === 'like') {
                        $value = "%$value%";
                    }
            
                    $query->where($column, $operator, $value);
                }
            }
            
        }
    
        $user = $query
            ->orderByRaw("CASE WHEN status = 'active' THEN 0 ELSE 1 END")
            ->orderBy('name', 'asc')
            ->paginate(10);
            
        return view('backend.pages.member.index', compact('user'));
    }
    

    public function memberCreate(){
        return view('backend.pages.member.create');
    }

    public function memberPost(Request $request){
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            Alert::info('Info', 'Email already exists!');
            return redirect()->back()
                ->withInput() 
                ->withErrors(['email' => 'Email sudah ada di database.']);
        }

        User::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'author',
            'status' => 'active',
        ]);

        Alert::success('Success', 'Member added successfully!!');
        return redirect()->route('member.index')->with('success', 'Member berhasil ditambahkan!');
    }

    public function memberEdit($id){
        $member = User::where('id', $id)->firstOrFail();
        return view('backend.pages.member.edit',compact('member'));
    }


    public function memberUpdate(Request $request, $id)
    {
        $users = User::findOrFail($id);

        $updateData = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->name),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|confirmed|min:8',
            ]);
            $updateData['password'] = bcrypt($request->input('password'));
        }

        $users->update($updateData);
        Alert::success('Success', 'Member updated successfully!!');
        return redirect()->back()->with('success', 'Users updated successfully.');
    }

    public function memberdelete($id)
    {
        $member = User::findOrFail($id);
        $member->delete();
        Alert::error('Delete', 'Member Deleted!!');
        return redirect()->route('member.index')->with('success', 'Member deleted successfully.');
    }


    // chart

    public function getChartData(Request $request)
    {
            $userId = $request->query('user_id');
            $dataType = $request->query('data_type', 'daily');
        
            if ($dataType == 'daily') {
                $chartData = Post::selectRaw('DATE(created_at AT TIME ZONE \'UTC\' AT TIME ZONE \'Asia/Jakarta\') as date, COUNT(*) as total')
                    ->where('user_id', $userId)
                    ->whereDate(DB::raw('DATE(created_at AT TIME ZONE \'UTC\' AT TIME ZONE \'Asia/Jakarta\')'), Carbon::today())
                    ->groupBy(DB::raw('DATE(created_at AT TIME ZONE \'UTC\' AT TIME ZONE \'Asia/Jakarta\')'))
                    ->orderBy(DB::raw('DATE(created_at AT TIME ZONE \'UTC\' AT TIME ZONE \'Asia/Jakarta\')'))
                    ->get();
            }
             elseif ($dataType == 'weekly') {
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek(); 
            
                $chartData = Post::selectRaw('
                    EXTRACT(YEAR FROM created_at) as year, 
                    EXTRACT(WEEK FROM created_at) as week, 
                    COUNT(*) as total')
                    ->where('user_id', $userId)
                    ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->groupBy(DB::raw('EXTRACT(YEAR FROM created_at), EXTRACT(WEEK FROM created_at)'))
                    ->orderBy(DB::raw('EXTRACT(YEAR FROM created_at), EXTRACT(WEEK FROM created_at)'))
                    ->get();
            } elseif ($dataType == 'monthly') {
                $chartData = Post::selectRaw('
                EXTRACT(MONTH FROM created_at) as month, 
                COUNT(*) as total')
                ->where('user_id', $userId)
                ->whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
                ->get();
            } else {
                return response()->json(['error' => 'Invalid data type'], 400);
            }
        
            return response()->json([
                'daily' => $dataType == 'daily' ? $chartData : [],
                'weekly' => $dataType == 'weekly' ? $chartData : [],
                'monthly' => $dataType == 'monthly' ? $chartData : []
            ]);
        
    }
    
    
}
