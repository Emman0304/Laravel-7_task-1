@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Student Application</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form name="myForm" id="myForm" action="{{ route('products.store') }}" method="POST" onsubmit="return validateForm()" >
@csrf

    
    <div class="row">
      <div class="col-25">
        <label for="fname">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Lastname, firstname">
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="mname">Middle Name  type (none) if unavailable</label>
        </div>
        <div class="col-75">
          <input type="text" id="mname" name="mname" value="" placeholder="Your middle name..">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="gender">Gender</label>
        </div>
        <div class="col-75">
            <select id="gender" name="gender">
              <option value="Other">Other</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              
            </select>
          </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="bday">Birthday</label>
        </div>
        <div class="col-75">
          <input type="text" id="bday" name="bday" placeholder="dd/mm/YYYY.">
        </div>
      </div>
    <div class="row">
        <div class="col-25">
          <label for="bplace">Birtplace</label>
        </div>
        <div class="col-75">
          <input type="text" id="bplace" name="bplace" placeholder="Your birthplace.">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="bplace">Contact</label>
        </div>
        <div class="col-75">
          <input type="number" id="contact" name="contact" placeholder="Your contact #">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="email" name="email" placeholder="Your email">
        </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="address" placeholder="Your address.">
      </div>
    </div><br>
    
      <div class="row">
        <center>
          <input type="submit" value="Submit">
        </center>
    </div>
   
</form>
@endsection