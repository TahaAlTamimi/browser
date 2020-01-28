@extends('layouts.layout')
@section('allArticle')

<!-- {{$articles}} -->
<div id="wrapper">
	<div id="page" class="container">
	<h1>our article</h1>
    @foreach($articles as $article)
		<div id="content">
			<div class="title">
         
			<h2>{{$article->title}}</h2> 
			<a href="/article/{{$article->id}}">	<span class="byline">{{$article->expert}}</span></a> </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<!-- <p>{{$article->body}} </p> -->
		</div>
        @endforeach
        </div></div>
		
@endsection