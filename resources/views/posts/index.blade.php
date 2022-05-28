@extends('layouts.app')

@section('title', 'Posts')

@section('content')



<div class="container mt-5">
    <div class="row">
        <div class="col-md">

            <div class="card-header mb-3 border rounded-3">
                <h3>Our Posts</h3>
            </div>
            @foreach($posts as $post)
                <div class="mb-2">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('posts.show', $post->id) }}" class="d-flex justify-content-center">

                                {{--<img src="{{$post->thumbnail}}">--}}
                                {{--Як я і говорив в листі чомусь не працює фейкер зображень. На скільки я зрозумів впва сайт, яким користувався фейкер.--}}

                                <img src="https://picsum.photos/320/260"> {{--Тимчасовий варіант--}}

                            </a>
                            <h2 class="fw-bold text-xxl-center text-muted text-decoration-none mt-2">{{$post->title}}</h2>
                        </div>
                        <div class="card-body text-center">
                            <p class="fs-5 fw-lighter">
                                {{ $post->preview }}
                            </p>

                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary "> Show me! </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>


        <div class="col-3">

            <div class="card-header mb-3 border rounded-3">
                <h3>Hot Posts</h3>
            </div>
            <div class="card-body bg-secondary">
                @foreach($hot as $post)
                    <div class="card-header mb-1">
                        <a href="{{ route('posts.show', $post->id) }}" class="d-flex justify-content-center">

                            {{--<img src="{{$post->thumbnail}}">--}}
                            {{--Як я і говорив в листі чомусь не працює фейкер зображень. На скільки я зрозумів впва сайт, яким користувався фейкер.--}}

                            <img src="https://picsum.photos/160/130"> {{--Тимчасовий варіант--}}

                        </a>
                        <p class="fs-6 fw-lighter">
                            {{ $post->preview }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>



    </div>
</div>

@endsection
