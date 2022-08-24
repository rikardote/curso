<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    }

    public function CategoryAdd()
    {
        return view('backend.category.category_add');
    }
    public function CategoryStore(Request $request)
    {
        Category::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::Now(),
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }
    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }
    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::Now(),
        ]);

        $notification = array(
            'message' => 'category Updated Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->route('category.all')->with($notification);
    }
    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

