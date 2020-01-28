@extends('layouts.layout')
@section('contact')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div id ='wrapper'>
<div id ='page'  class='container'>

<form class="form-inline" method='post' action='/contact'>
{{csrf_field()}}
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputemail2" class="sr-only">E-mail</label>
    <input  type="email" class="form-control" id="inputemail2" name='email' placeholder="email" required>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>

</form>
@if(session('message'))
<div>
{{session('message')}}
</div>
@endif

@error('email')
<div> {{$message}} </div>
@enderror
</div></div>
@endsection