@extends('layouts.layout')
 @section('creat') 

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div id ='wrapper'>
<div id ='page'  class='container'>
<h1>updateArticle </h1>

<form action="/article/{{$article->id}}" method='post'>
{{csrf_field()}}
@method('put')

<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="title" name="title"  value='{{$article->title}}' required>
  </div>

  <div class="form-group">
    <label for="expert">expert</label>
    <textarea class="form-control" id="expert" rows="3" name='expert' required>{{$article->expert}}</textarea>
  </div>

  <div class="form-group">
    <label for="body">body</label>
    <textarea class="form-control" id="body" rows="3" name='body' required>{{$article->body}}</textarea>
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
