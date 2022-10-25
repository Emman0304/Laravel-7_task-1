<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return   view('home');
        
    }

    public function indexTable()
    {
        $products = Product::latest()->paginate(5);
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function showTable(){
        return view('products.table');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'mname' => 'required',
            'gender' => 'required',
            'contact' => 'required|unique:products',
            'email' => 'required|email|unique:products',
            'bday' => 'required',
            'bplace' => 'required',
            'address' => 'required'
            
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('index')
                        ->with('success','Student info created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    Public function edit($id){
        $student=DB::table('products')->where('id',$id)->first();
        return view('products.edit',compact('student'));
    }
    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required | unique:products,name,'.$id,
            'mname' => 'required',
            'gender' => 'required',
            'contact' => 'required | unique:products,contact,'.$id,
            'email' => 'required |email| unique:products,email,'.$id,
            'bday' => 'required',
            'bplace' => 'required',
            'address' => 'required'
            
        ]);

        $data=array();
            $data['name']=$request->name;
            $data['mname']=$request->mname;
            $data['gender']=$request->gender;
            $data['bday']=$request->bday;
            $data['bplace']=$request->bplace;
            $data['contact']=$request->contact;
            $data['email']=$request->email;
            $data['address']=$request->address;

            $prod=DB::table('products')->where('id',$id)->update($data);
  
        return redirect()->route('index')
                        ->with('success','Student info updated successfully');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Product  $product
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $data = DB::table('products')->where('id',$id)->first(); 
            $dataDel = DB::table('products')->where('id',$id)->delete(); 

            return redirect()->route('index')
                            ->with('success','Student info deleted successfully');
        }
        public function export() 
        {
            return Excel::download(new UsersExport, 'students.xlsx');
        }
        public function import(Request $request) 
        {
            Excel::import(new UsersImport, $request->file);
            
            return redirect()->route('index');
        
        }
        public function signUp()
        {
            return view('loginForm.signUp');
        }
        public function signIn()
        {
            return view('loginForm.signin');
        }

        public function storeSignup(Request $request)
        {

            $request->validate([
                'name' => 'required|unique:products',
                'mname' => 'required',
                'gender' => 'required',
                'contact' => 'required|unique:products',
                'email' => 'required|email|unique:products',
                'bday' => 'required',
                'bplace' => 'required',
                'address' => 'required'
                
            ]);

            Product::create($request->all());

            return redirect()->route('signin')
                            ->with('success','Registered successfully.');


        }
        public function generatePDF()
        {
            $students = Product::all();
            $pdf = PDF::loadView('table',compact('students'));
            return $pdf->download('students.pdf');
        }
        public function display (){

            $students = Product::all();

            return view('table',compact('students'));
        }
    }