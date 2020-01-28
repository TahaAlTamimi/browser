@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
<form method='post' action='/payment'>
@csrf
              <button> Make Payments </button>
             </form>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
