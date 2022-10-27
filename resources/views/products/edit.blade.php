@extends('products.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('index') }}"> Back</a>
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
  
    <form id="myForm" action="{{URL::to('update/student/'.$student->id)}}" method="POST" onsubmit="return validateForm()" >
        @csrf
        <!-- @method('PUT') -->
   
    <div class="row">
      <div class="col-25">
        <label for="firstname">First Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="firstname" name="firstname" value="{{$student->firstname}}" placeholder="Firstname" minlength="3" maxlength="50" >
        <span class="error_form" id="fname_error_message"></span>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lastname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lastname" name="lastname" value="{{$student->lastname}}" placeholder="Lastname" minlength="2" maxlength="50" >
        <span class="error_form" id="lname_error_message"></span>
      </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="mname">Middle Name  type (none) if unavailable</label>
        </div>
        <div class="col-75">
          <input type="text" id="mname" name="mname" value="{{$student->mname}}" placeholder="Your middle name.." minlength="1" maxlength="30" >
          <span class="error_form" id="mname_error_message"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="gender">Gender</label>
        </div>
        <div class="col-75">
            <select id="gender" name="gender" value="{{$student->gender}}" >
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
          <input  type="text" class="bday" id="bday" name="bday"  value="{{$student->bday}}">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="age">Age</label>
        </div>
        <div class="col-75">
          <input type="number" id="age" name="age"  value="{{$student->age}}" style="width: 50%" >
          <span class="error_form" id="age_error_message"></span>
        </div>
      </div>
      
    <div class="row">
        <div class="col-25">
          <label for="bplace">Birtplace</label>
        </div>
        <div class="col-75">
          <input type="text" id="bplace" name="bplace" value="{{$student->bplace}}" placeholder="Your birthplace.">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
          <label for="bplace">Contact</label>
        </div>
        <div class="col-75">
          <input type="number" id="contact" name="contact" value="{{$student->contact}}" placeholder="Your contact #" maxlength="11" >
        </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="address">Address</label>
      </div>
      <div class="col-75">
        <input type="text" id="address" name="address" value="{{$student->address}}" placeholder="Your address.">
      </div>
    </div><br>
    <div class="row">
        <div class="col-25">
          <label for="email">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="email" name="email" value="{{$student->email}}" placeholder="Your email">
          <span class="error_form" id="email_error_message"></span>
        </div>
    </div><br>
    
      <div class="row">
        <center>
          <input type="submit" value="Update">
        </center>
    </div>
   
    </form>
@endsection