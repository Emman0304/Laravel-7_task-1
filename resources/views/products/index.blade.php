@extends('products.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>STUDENT APPLICATION FORM</h2>
            </div>
            
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Application</a>
                    <a class="btn btn-success"  href="{{ route('export') }}"> Export Excel</a>
                    <a class="btn btn-success"  href="{{ route('pdf') }}"> Export PDF</a>
                    <a class="btn btn-danger"  href="{{ route('home') }}"> HOME</a><br><br>

                    <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- <div class="row">
                            <div class="col-md-6 offset-md-3 ">
                                <div class="form-group"> -->
                                    <input type="file" name="file" class="form-control" >
                                <!-- </div> -->
                                <button type="submit" class="btn btn-primary" style="margin-top: 3px" >Import Excel File</button>
                            <!-- </div>
                        </div> -->
                    </form>

                </div>
            
                
            
            
        </div>
    </div><br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

   

   <div style="overflow-x:auto;" >
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>M.I.</th>
                <th>gender</th>
                <th>birthday</th>
                <th>Birth Place</th>
                <th>Contact #</th>
                <th>Email</th>
                <th>Address</th>
                <th width="150px"> Action</th>
                
            </tr>
            @foreach ($products as $product)
            <tr>
                <!-- <td>{{ ++$i }}</td> -->
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->mname }}</td>
                <td>{{ $product->gender }}</td>
                <td>{{ $product->bday }}</td>
                <td>{{ $product->bplace }}</td>
                <td>{{ $product->contact }}</td>
                <td>{{ $product->email }}</td>
                <td>{{ $product->address }}</td>
                <td>
                        <form name="myForm" id="myForm" onsubmit="return validateForm()" action="{{ route('products.destroy',$product->id) }}" method="POST">
    
                        <!-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> -->
                            <center>
                               <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
    
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button> 
                            </center>
                            
                        
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </table>
   </div>
    
  
    {!! $products->links() !!}
      
@endsection