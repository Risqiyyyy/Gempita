<?php

namespace App\Http\Controllers;
use App\Models\Reporter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReporterController extends Controller
{
    public function reporterIndex(Request $request)
    {
        $query = Reporter::query();

        $allowedColumns = ['name', 'email']; 
        $allowedOperators = ['=', '>', '<', 'like'];

        if ($request->has('filter_columns')) {
            foreach ($request->input('filter_columns') as $index => $column) {
                $operator = strtolower($request->input('filter_operators')[$index] ?? '=');
                $value = $request->input('filter_values')[$index] ?? '';

                if (!in_array($column, $allowedColumns)) {
                    continue;
                }

                if (!in_array($operator, $allowedOperators)) {
                    continue;
                }

                if (!empty($column) && !empty($value)) {
                    if ($operator === 'like') {
                        $value = strtolower($value);
                        $query->whereRaw("LOWER($column) LIKE ?", ["%{$value}%"]);
                    } else {
                        $query->where($column, $operator, $value);
                    }
                }
            }
        }

        $user = $query
            ->orderBy('name', 'asc')
            ->where('is_deleted','no')
            ->paginate(10);

        return view('backend.pages.reporter.index', compact('user'));
    }

    public function reporterCreate(){
        return view('backend.pages.reporter.create');
    }
    
    public function reporterPost(Request $request){

        $emailExists = Reporter::where('email', $request->email)
            ->where('is_deleted', 'no')
            ->exists();

        if ($emailExists) {
            Alert::info('Info', 'Email already exists!');
            return redirect()->back()
                ->withInput() 
                ->withErrors(['email' => 'Email sudah ada di database.']);
        }

        Reporter::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_deleted' => 'no'
        ]);

        Alert::success('Success', 'Reporter added successfully!!');
        return redirect()->route('reporter.index')->with('success', 'Reporter berhasil ditambahkan!');
    }

    public function reporterEdit($id){
        $reporter = Reporter::where('id', $id)->firstOrFail();
        return view('backend.pages.reporter.edit',compact('reporter'));
    }

    public function reporterUpdate(Request $request, $id)
    {
        $reporter = Reporter::findOrFail($id);

        $updateData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        $reporter->update($updateData);
        Alert::success('Success', 'Reporter updated successfully!!');
        return redirect()->back()->with('success', 'Reporter updated successfully.');
    }


    public function reporterdelete($id)
        {
            $reporter = Reporter::findOrFail($id);

            $updateData = [
                'is_deleted' => 'yes'
            ];

            $reporter->update($updateData);
            Alert::error('Delete', 'Reporter Deleted!!');
            return redirect()->route('reporter.index')->with('success', 'Reporter deleted successfully.');
        }
}