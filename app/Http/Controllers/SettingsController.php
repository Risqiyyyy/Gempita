<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use UniSharp\LaravelFilemanager\Controllers\LfmController;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;


class SettingsController extends Controller
{
    // Annalytics
    public function annalytic()
    {
        $settings = Settings::first();
        return view('backend.pages.settings.googleAnnalytic.index',compact('settings'));
    }

    public function addannalytic(Request $request)
    {
        $request->validate([
            'analytics' => 'required|string',
        ]);

        $settings = Settings::first();

        if ($settings) {
            $settings->update([
                'analytics' => $request->analytics,
            ]);
    
            Alert::success('Success', 'Analytics updated successfully!');
        } else {

            Settings::create([
                'analytics' => $request->analytics,
            ]);
    
            Alert::success('Success', 'Analytics added successfully!');
        }

        return redirect()->route('settings.annalytic')->with('success', 'Analytics berhasil ditambahkan!');
    }

    // Google Tag
    public function googleTag()
    {
        $settings = Settings::first();
        return view('backend.pages.settings.googleTag.index',compact('settings'));
    }

    public function addgoogleTag(Request $request)
    {
        $request->validate([
            'gtag' => 'required|string',
        ]);

        $settings = Settings::first();

        if ($settings) {
            $settings->update([
                'gtag' => $request->gtag,
            ]);
    
            Alert::success('Success', 'Google Tag updated successfully!');
        } else {

            Settings::create([
                'gtag' => $request->gtag,
            ]);
    
            Alert::success('Success', 'Google Tag added successfully!');
        }

        return redirect()->route('settings.googletag')->with('success', 'gtag berhasil ditambahkan!');
    }

    // Member Dasboard
    public function memberDashboard(Request $request)
    {
        $query = User::query();
    
        $query->where('role', 'admin'); 
    
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
    
        $user = $query->orderBy('name', 'asc')->paginate(10);
        return view('backend.pages.settings.memberDashboard.index',compact('user'));
    }

    public function editMemberDashboard($id)
    {
        $member = User::where('id', $id)->firstOrFail();
        return view('backend.pages.settings.memberDashboard.edit',compact('member'));
    }

    public function createMemberDashboard()
    {
        return view('backend.pages.settings.memberDashboard.create');
    }
    
    public function addMemberDashboard(Request $request){
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        if ($emailExists) {
            return redirect()->back()
                ->withInput() 
                ->withErrors(['email' => 'Email sudah ada di database.']);
        }

        User::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'status' => 'active',
        ]);
        Alert::success('Success', 'Member added successfully!!');
        return redirect()->route('settings.memberDashboard')->with('success', 'Admin berhasil ditambahkan!');
    }

    public function deleteMemberDashboard($id)
    {
        $member = User::findOrFail($id);
        $member->delete();
        Alert::error('Delete', 'Member Deleted!!');
        return redirect()->route('settings.memberDashboard')->with('success', 'Member deleted successfully.');
    }

    public function getItems(Request $request)
    {
        $searchQuery = $request->get('search');
        dd($searchQuery);
        $workingDir = '/shares';

        $items = array_merge($this->lfm->folders($workingDir), $this->lfm->files($workingDir));
    
        if (!empty($searchQuery)) {
            $items = array_filter($items, function ($item) use ($searchQuery) {
                $attributes = $item->attributes;
                return isset($attributes['name']) && stripos($attributes['name'], $searchQuery) !== false;
            });
        }

        usort($items, function ($a, $b) {
            $nameA = strtolower($a->name);
            $nameB = strtolower($b->name);
    
            $isNumA = ctype_digit(substr($nameA, 0, 1));
            $isNumB = ctype_digit(substr($nameB, 0, 1));
    
            if ($isNumA && !$isNumB) return 1;
            if (!$isNumA && $isNumB) return -1;
    
            return strcmp($nameA, $nameB);
        });


        $perPage = request('per_page', 50);
        $currentPage = request('page', 1);
        $totalItems = count($items);
        $pagedItems = array_slice($items, ($currentPage - 1) * $perPage, $perPage);
    
        return [
            'items' => array_map(function ($item) {
                return $item->fill()->attributes;
            }, $pagedItems),
            'paginator' => [
                'total' => $totalItems,
                'per_page' => $perPage,
                'current_page' => $currentPage,
            ],
            'display' => $this->helper->getDisplayMode(),
            'working_dir' => $workingDir,
            'search_query' => $searchQuery,
        ];
    }

    
}
