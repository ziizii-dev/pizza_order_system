<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    //direct categoy  list paage
    public function list(){
        // dd(request('key'));
        $categories = Category:: when(request('key'),function($query){
            $query ->where('name','like','%'.request('key').'%');
        })
        ->orderBy('id','desc')
        ->paginate(5);
        $categories->appends(request()->all());
        // dd($categories);
        return view ('admin.category.list',compact('categories'));
    }
    //direct create page
    public function createPage(){
        return view ('admin.category.create');
    }
    //create category
    public function create(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data= $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#list');
        // ->with(['categorySuccess'=>'Catrgory Created......']);

    }
    //delete category
    public function delete($id){
        // dd($id);
        Category::select('id','$id')->delete();
        return redirect()->route('category#list')->with(['categoryDelete'=>'Category Deleted']);
    }
       //edit category
       public function edit($id){
        $category = Category::where('id', $id)->first();
        return view ('admin.category.edit',compact('category'));
       }
       //update category
       public function update(Request $request){
        // dd($id,$request->all());
        $this->categoryValidationCheck($request);
        $data= $this->requestCategoryData($request);
        Category::where('id',$request->categoryId)->update($data);
        return redirect()->route('category#list');


       }

    //category Validation check
    private function categoryValidationCheck($request){
          Validator::make($request->all(),[
            'categoryName'=>'required|unique:categories,name,'.$request->categoryId

          ])->validate();
    }
    //request category data
    private function requestCategoryData($request){
        return[
            'name'=>$request->categoryName,
        ];
    }

}
