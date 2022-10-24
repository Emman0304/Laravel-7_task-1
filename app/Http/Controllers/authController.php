<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    public function signUp()
    {
        return view('loginForm.signUp');
    }
    public function signIn()
    {
        return view('loginForm.signin');
    }
    
    public function store(Request $request)
    {
        // $users= new Product;

        // $users->name=$request->name;
        // $users->mname=$request->mname;
        // $users->gender=$request->gender;
        // $users->bday=$request->bday;
        // $users->bplace=$request->bplace;
        // $users->contact=$request->contact;
        // $users->address=$request->address;
        // $users->email=$request->email;
        // $users->password=$request->password;

        // $users->save();
        // return view('');

        $request->validate([
            'name' => 'required|unique:products',
            'mname' => 'required',
            'gender' => 'required',
            'contact' => 'required|unique:products',
            'email' => 'required|email|unique:products',
            'bday' => 'required',
            'bplace' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('signin')
                        ->with('success','Registered successfully.');


    }
    public function login(Request $r){

       $email=$r->email;
       $password=$r->password;

    //    $conn = select('select * from users where name = '$email' and password = '$password') ;
       $conn = DB::table('products')->where('email', $email);
        
       if ($conn) {
            echo "Acc registered";
        }else{
            echo "Acc not registered";
        }
    } 
        
}   
