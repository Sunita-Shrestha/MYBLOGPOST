<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\Common;

use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    use Common;  // trait
    public function index()
    {
        $data['value1'] = $this->fun1();
        $data['value2'] = $this->status(1);



        $category = Category::all();
        return view('admin.category.index', $data, compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request)  // validation via CategoryFormRequest so  Request ->CategoryFormRequest
    {
        $data = $request->validated();

        $catetory = new Category();
        $catetory->title = $data['title'];
        $catetory->slug = Str::slug($data['slug']);
        $catetory->description = $data['description'];
        // $catetory->image = $data['image'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $catetory->image = $filename;
        }


        $catetory->meta_title = $data['meta_title'];
        $catetory->meta_description = $data['meta_description'];
        $catetory->meta_keyword = $data['meta_keyword'];
        $catetory->navbar_status = $request->navbar_status == true ? '1':'0';
        $catetory->status = $request->status == true ? '1':'0';
        $catetory->created_by = Auth::user()->id;
        $catetory->save();
        return redirect('admin/category')->with('status', 'Category added successfully');

    }

    public function edit($category_id){
        $category = Category::find($category_id);
        return view('admin.category.edit', compact('category'));

    }

    public function update(CategoryFormRequest $request, $category_id){

        $data = $request->validated();

        $category =  Category::find($category_id);
        $category->title = $data['title'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];
        // $catetory->image = $data['image'];
        if($request->hasFile('image')){

            $destination = 'uploads/category/' .$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }


        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1':'0';
        $category->status = $request->status == true ? '1':'0';
        $category->created_by = Auth::user()->id;
        $category->update();
        return redirect('admin/category')->with('status', 'Category added successfully');


    }

    public function delete($category_id){
        $category = Category::find($category_id);

        if($category){
            $category->delete();
            return redirect('admin/category')->with('status', 'Category Deleted Successfully');
        }
        else{
            return redirect('admin/category')->with('message','No category found');
              }


    }
}
