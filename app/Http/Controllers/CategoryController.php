<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $file_name = $this->saveImage($request->image , 'images/categories');

        Category::create([
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'description_ar' => $request['description_ar'],
            'description_en' => $request['description_en'],
            'image' => $file_name,
        ]);

        session()->flash('category-created-message','Category was created');
        return redirect()->route('categories.index');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));
    }

    public function update(Request $request, Category $category)
    {

//        if (request('image'))
//            {
//                $file_name = $this->saveImage($request->image , 'images/categories');
//                $request['image'] =$file_name;
//            }

        $file_name = $this->saveImage($request->image , 'images/categories');


        $category->update([
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'description_ar' => $request['description_ar'],
            'description_en' => $request['description_en'],
            'image' => $file_name,
            ]);

        session()->flash('category-updated-message','Category was Updated');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('category-deleted-message','Category was Deleted');
        return redirect()->route('categories.index');
    }
}
