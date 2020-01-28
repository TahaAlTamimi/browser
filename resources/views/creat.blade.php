@extends('layouts.layout')
@section('creat')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div id ='wrapper'>
<div id ='page'  class='container'>
<h1>New Article </h1>

<form action="/creat" method='post'>
{{csrf_field()}}

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="title" name="title" >
  <p>{{$errors->first('title')}}   </p>
  </div>

  <div class="form-group">
    <label for="expert">expert</label>
    <textarea class="form-control" id="expert" rows="3" name='expert' ></textarea>
    <p>{{$errors->first('expert')}}   </p>
  </div>

  <div class="form-group">
    <label for="body">body</label>
    <textarea class="form-control" id="body" rows="3" name='body' ></textarea>
    <p>{{$errors->first('body')}}   </p>
  </div>


  <div class="form-group">
    <label for="tags">tags</label>
   <select
   id="sel"
   name='tags[]'
   multiple
   required
   >
   @foreach ($tags as $tag)
   <option value='{{$tag->id}}'>{{$tag->name}}</option>
   @endforeach
   
   </select>
    <p>{{$errors->first('tags')}}   </p>
  </div>

  <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>

</div>
</div>

@endsection
