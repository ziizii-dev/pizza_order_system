<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RouteController extends Controller
{
    //get product lists
    public function productList(){
        $products = Product::get();
        $user = User::get();
        $data = [
            'product' =>$products,
            'user' =>$user
        ];
        return response()->json($data, 200);
    }

    //get contact list
    public function contactList(){
        $contact = Contact::orderBy('id','desc')->get();
        return response()->json($contact, 200);
    }
//get order list
public function orderList(){
    $orderlists = OrderList::get();
    $orderlist=[
           'orderlist'=>$orderlists,
    ];
    return response()->json($orderlist, 200);
}
 //get category list
 public function categoryList(){
    $categories = Category::orderBy('id','desc')->get();
    $orders =Order::get();
    $category =[
        'category'=>$categories,
    ];
    return response()->json($category, 200);
}
//create category (Post)
public function categoryCreate(Request $request){
// dd($request->all());
$data = [
    'name'=>$request->name,
    'created_at'=>Carbon::now(),
    'updated_at'=>Carbon::now()
];
$response = Category::create($data);
return response()->json($response, 200);


}

//create contact
public function createContact(Request $request){
   $data= $this->getContactData($request);
   Contact::create($data);
   $contact = Contact::orderBy('created_at','desc')->get();
   return response()->json($contact, 200);

}

//delete category
public function deleteCategory($id,Request $request){

$data = Category::where('id',$request->id)->first();
// return $data;
if(isset($data)){
    Category::where('id',$request->id)->delete();
    return response()->json([  'status'=>'true','message'=>'delete success','deleteData'=>$data],200);
}
return response()->json(['status'=>'false', 'message'=>'there is no data' ],200);

}
//category details
public function categoryDetails(Request $request){
    // return $request->all();
    $data= Category::where('id',$request->category_id)->first();
    if(isset($data)){
      return response()->json(['status'=>'true','categoryDetails'=>$data],200);
    }
    return response()->json(['status'=>'false','categoryDetails'=>'There is no data'],500);

}
//update category
public function updateCategory(Request $request){
    // return $request->all();
    $categoryId=$request->category_id;
    $dbSource=Category::where('id',$categoryId)->first();
    if(isset($dbSource)){
        $data = $this->getCategoryData($request);
       Category::where('id',$categoryId)->update($data);
       $response = Category::where('id',$categoryId)->first();
        return response()->json(['status'=>'ture','message'=>'updated success','category'=>$response],200);
    }
    return response()->json(['status'=>'false','message'=>'there is no data'],500);

    return $data;

}
private function getCategoryData($request){
    return[
       'name'=>$request->category_name,
       'created_at'=>Carbon::now(),
       'updated_at'=>Carbon::now()

    ];
}
private function getContactData($request){
    return[
           'name'=>$request->name,
           'email'=>$request->email,
           'message'=>$request->description,
           'updated_at'=>Carbon::now(),
    ];
}

}
