<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //contact page
    public function userContactList(){
        $contacts= Contact::paginate(5);
        // dd($contacts->toArray());
        return view ('admin.contact.list',compact('contacts'));
    }
 public function deleteContact ($id){
    Contact::where('id',$id)->delete();
    return back();

 }
}
