@extends('products.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>STUDENT APPLICATION FORM</h2>
                
            </div>
            
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('create') }}"> Create New Application</a>
                    <a class="btn btn-success"  href="{{ route('export') }}"> Export Excel</a>
                    <a class="btn btn-success"  href="{{ route('pdf') }}"> Export PDF</a>
                    <!-- <a class="btn btn-danger"  href="{{ route('home') }}"> HOME</a><br><br> -->

                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a><br><br>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="file" class="form-control" >
                            <button type="submit" class="btn btn-primary" style="margin-top: 3px" >Import Excel File</button>
                    </form>

                </div>
        </div>
    </div><br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    @if (session()->has('failures'))
        <table class="table table-danger" > 
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>validations</th>
                <th>Value</th>
            </tr>
            @foreach (session()->get('failures') as $validation )
                <tr>
                    <td>{{ $validation->row() }}</td>
                    <td>{{ $validation->attribute() }}</td>
                    <td>
                        <ul>
                            @foreach ($validation->errors() as $e )
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $validation->values()[$validation->attribute()] }}
                    </td>
                </tr>
                
            @endforeach
        </table>
    @endif

   <div style="overflow-x:auto;" >
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>M.I.</th>
                <th>Age</th>
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
                <td>{{ $product->lastname }}</td>
                <td>{{ $product->firstname }}</td>
                <td>{{ $product->mname }}</td>
                <td>{{ $product->age }}</td>
                <td>{{ $product->gender }}</td>
                <td>{{ $product->bday }}</td>
                <td>{{ $product->bplace }}</td>
                <td>{{ $product->contact }}</td>
                <td>{{ $product->email }}</td>
                <td>{{ $product->address }}</td>
                <td>
                        
                            <center>
                               <a class="btn btn-primary" href="{{URL::to('edit/student/'.$product->id)}}">Edit</a>
                               <a class="btn btn-danger" href="{{URL::to('delete/student/'.$product->id)}}" onclick="return confirm('confirm delete?')" >Delete</a>
 
                            </center>
                            
                </td>
            </tr>
            @endforeach
        </table>
   </div>
    
  
    {!! $products->links() !!}
      
@endsection