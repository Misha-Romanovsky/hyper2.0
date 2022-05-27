@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in as {{ Auth::user()->name }}</p>
                        <br>
                    <p><a href="{{route('index')}}" style="text-decoration: none">Tap me</a> to see Posts</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
