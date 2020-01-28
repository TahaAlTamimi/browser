@extends('layouts.layout')
@section('reports')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <h1>Reports Article </h1>
 
<div class="card">
@foreach($reports as $report)
<li>{{$report->reason}}</li>
@endforeach

@foreach($guest_reports as $guest_report)
<li>{{$guest_report->reason}}</li>

@endforeach
</div>



@endsection

