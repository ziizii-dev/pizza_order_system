<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
  //product list page
  public function list(){
    $pizzas = Product::select('products.*','categories.name as category_name')
                ->when(request('key'),function($query){
                $query->where('products.name','like','%'.request('key').'%');
              })->leftJoin('categories','products.category_id','categories.id')
                ->orderBy('products.created_at','desc')
                ->paginate(3);
                $pizzas->appends(request()->all());
    return view ('admin.product.pizzaList',compact('pizzas'));
  }
  //direct pizza create list
  public function createPage(){
    $categories = Category::select('id','name')->get();
    // dd($categories->toArray());
    return view ('admin.product.create',compact('categories'));
  }
       //delete pizza
       public function delete($id){
        Product::where('id',$id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess'=>'Product delete success']);
       }
       //edit pizza
       public function edit($id){
        $pizza = Product::select('products.*','categories.name as category_name')
                         ->leftJoin('categories','products.id','categories.id')
                         ->where('products.id',$id)->first();
        return view('admin.product.edit',compact('pizza'));
       }
        //update pizza
        public function updatePage($id){
          $pizza = Product::where('id',$id)->first();
          $category= Category::get();
          return view ('admin.product.update',compact('pizza','category'));

        }

  //create product
  public function create(Request $request){
    // dd($request->all());
    $this->productValidationCheck($request,"create");
   $data= $this->requestProductInfo($request);
   $fileName = uniqid().$request->file('pizzaImage')->getClientOriginalName();
   $request->file('pizzaImage')->storeAs('public',$fileName);
   $data['image']=$fileName;
   Product::create($data);
   return redirect()->route('product#list');
  }
   //update pizza
   public function update(Request $request){
    $this->productValidationCheck($request,"update");
   $data = $this->requestProductInfo($request);
   if($request->hasFile('pizzaImage')){
    $oldImageName = Product::where('id',$request->pizzaId)->first();
    $oldImageName = $oldImageName->image;

    if($oldImageName != null){
      Storage::delete('public/'.$oldImageName);
    }
    $fileName = uniqid().$request->file('pizzaImage')->getClientOriginalName();
    $request->file('pizzaImage')->storeAs('public',$fileName);
    $data['image']=$fileName;
   }
      Product::where('id',$request->pizzaId)->update($data);
      return redirect()->route('product#list');
  }

  //request product info
  private function requestProductInfo($request){
        return[
            'category_id'=>$request->pizzaCategory,
            'name'=>$request->pizzaName,
            'description'=>$request->pizzaDescription,
            // 'imgae'=>$request->pizzaImage,
            'price'=>$request->pizzaPrice,
            'waiting_time'=>$request->pizzaWaintingTime,
        ];
  }
  //product validation checks
  private function productValidationCheck ($request,$action){
    $validationRules =[
      'pizzaName'=>'required|min:5|unique:products,name,'.$request->pizzaId,
           'pizzaCategory'=>'required',
           'pizzaDescription'=>'required|min:10',
           'pizzaPrice'=>'required',
           'pizzaWaintingTime'=>'required',
    ];
    $validationRules['pizzaImage']= $action == "create" ? 'required| mimes:jpg,png,jpeg|file':"mimes:jpg,png,jpeg|file ";

    Validator::make($request->all(),$validationRules)->validate();
  }
}
