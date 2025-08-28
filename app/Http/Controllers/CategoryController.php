<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Categori;
use App\Models\SubCategory;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function categoryEdit($id) {
        $categories = Categori::all(); 
        $category = Categori::where('id', $id)->firstOrFail();
        return view('backend.pages.blog.category.edit',compact('categories','category'));
    }
    public function categoryCreate() {
        $categories = Categori::with('subCategories')->get();
        return view('backend.pages.blog.category.create',compact('categories'));
    }

    public function categoryUpdate(Request $request, $id) {
        $request->validate([
            'nama_kategori' => 'required|string|max:250|unique:categories,nama_kategori,' . $id . '|unique:sub_categories,nama_sub_kategori,' . $id,
            'parent_id' => 'nullable|exists:categories,id',
        ]);
    
        if ($request->has('parent_id') && $request->parent_id) {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->nama_sub_kategori = $request->nama_kategori;
            $subCategory->category_id = $request->parent_id;
            $subCategory->slug = \Str::slug($request->nama_kategori);
            $subCategory->save();
    
            Alert::success('Success', 'Sub Category updated successfully!!');
            return redirect()->back()->with('success', 'Sub Category updated successfully.');
        } else {
            $category = Categori::findOrFail($id);
            $category->nama_kategori = $request->nama_kategori;
            $category->slug = \Str::slug($request->nama_kategori);
            $category->save();
    
            Alert::success('Success', 'Category updated successfully!!');
            return redirect()->back()->with('success', 'Category updated successfully.');
        }
    }    


    public function SubcategEdit($id) {
        $categories = Categori::all(); 
        $category = SubCategory::where('id', $id)->firstOrFail();
        return view('backend.pages.blog.category.subcateg',compact('categories','category'));
    }

    public function subCategoryUpdate(Request $request, $id) {
        // dd($request);
    
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->nama_sub_kategori = $request->nama_kategori;
        $subCategory->slug = \Str::slug($request->nama_kategori);
        $subCategory->category_id = $request->parent_id;
        $subCategory->save();
    
        Alert::success('Success', 'Sub Category updated successfully!');
        return redirect()->back();
    }
    

    public function categoryAdd(Request $request) {

        $request->validate([
            'nama_kategori' => 'required|string|max:250|unique:categories,nama_kategori|unique:sub_categories,nama_sub_kategori',
            'parent_id' => 'nullable|exists:categories,id',
        ]);


        if ($request->has('parent_id') && $request->parent_id) {
            $subCategory = new SubCategory();
            $subCategory->nama_sub_kategori = $request->nama_kategori;
            $subCategory->category_id = $request->parent_id;
            $subCategory->slug = \Str::slug($request->nama_kategori);
            $subCategory->save();
            Alert::success('Success', 'Sub Category added successfully!!');
            return redirect()->back()->with('success', 'Category Added successfully.');

        } else {
            $category = new Categori();
            $category->nama_kategori = $request->nama_kategori;
            $category->slug = \Str::slug($request->nama_kategori);
            $category->save();
            Alert::success('Success', 'Category added successfully!!');
            return redirect()->back()->with('success', 'Category Added successfully.');
        }

    }
    
    public function categoryDestroy($id){
        $category = Categori::where('id', $id)->first();

        if ($category) {
            $category->delete();
            Alert::error('Delete', 'Category Deleted!!');
            return redirect()->route('category.create')->with('success', 'Category deleted successfully.');
        }

        return redirect()->route('category.edit')->with('error', 'Category not found.');
    }

    public function subcategDestroy($id){
        $category = SubCategory::where('id', $id)->first();

        if ($category) {
            $category->delete();
            Alert::error('Delete', 'Sub Category Deleted!!');
            return redirect()->route('category.create')->with('success', 'Category deleted successfully.');
        }
        
        return redirect()->back()->with('success', 'Category not found..');
    }
}
