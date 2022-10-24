<?php
  
namespace App\Http\Controllers;
  
use App\Product;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
// use PDF;
use Barryvdh\DomPDF\PDF;
  
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
            'address' => 'required',
            'password' => 'required'
        ]);
  
        Product::create($request->all());
   
        return redirect()->route('products.index')
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
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'mname' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'bday' => 'required',
            'bplace' => 'required',
            'address' => 'required',
            'password' => 'required'
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('index')
                        ->with('success','Student info updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')
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
    
}