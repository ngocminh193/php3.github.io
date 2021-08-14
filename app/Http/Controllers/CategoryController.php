<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $data = Category::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.category.index',compact('data'));
    }
    public function create() {
        return view('admin/category/create');
    }
    public function store(StoreRequest $request){
        Category::create($request->all());
        return redirect()->route('category.index');
    }
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, Category $category){
        request()->validate([
            'name' => 'required|unique:category',
        ],[
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
        ]);
        $category->update($request->only('name','status'));
        return redirect()->route('category.index');
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }


}
