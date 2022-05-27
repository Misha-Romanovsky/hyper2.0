@extends('layouts.app')

@section('title', 'Hyper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Main Page</div>
                    <div class="card-body">

                        @if(!auth('web'))
                            <p>If you want to see some interesting you need too login!)</p>
                        @else
                            {!! redirect('posts') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
