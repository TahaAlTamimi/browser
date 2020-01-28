@extends('layouts.layout')
@section('article')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">

			<a ><h2>{{$article->title}}</h2> </a>
				<span class="byline">{{$article->expert}}</span> </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<p>{{$article->body}} </p>
			<div>




		@foreach($article->tags as $tag)
		<a href='/article?tag={{$tag->name}}'>{{$tag->name}}</a>
		@endforeach
		</div>

		@can('update', $article)

		<a href='/article/{{$article->id}}/edit'>	<button class="button is-link" type="submit">Edit</button><a>
@endcan
@can('delete', $article)
		<form action="/article/{{$article->id}}" method='post'>
		{{csrf_field()}}
		@method('delete')
			<button class="button is-link" type="submit">Delete</button>
	</form>
	@endcan








<div id ='page'  class='container'>
<h1>Report abuse </h1>

@if(Auth::check())


<form action="/reports/{{$article->id}}" method='post'>
{{csrf_field()}}

 <div class="form-group">
    <label for="reason">reason</label>
    <textarea class="form-control" id="reason" placeholder="write your reasons" rows="3" name='reason' value="{{old('reason')}}"></textarea>
	{{$errors->first('reason')}}
  </div>

  <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>

</div>
@else
<form action="/reports/{{$article->id}}"  method='post'>
{{csrf_field()}}
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{old('name')}}" >
	<p>{{$errors->first('name')}}   </p>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
	<input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{old('email')}}" >
	<p>{{$errors->first('email')}}   </p>
  </div>

  <div class="form-group">
    <label for="reason">Reason</label>
    <textarea class="form-control" id="reason" rows="3" placeholder="write your resons" name='reason' value="{{old('reason')}}"></textarea>
	@error('reason')
<p>{{$message}}</p>
@enderror
  </div>

  <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>

            </form>

</div>


@endif

		</div>



@endsection
