@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="container">
        <div class="row m-auto px-4 py-5 w-100">

            <div class="bg-white shadow-lg">

                <div class="d-flex justify-content-center mt-2 ">
                    {{--<img src="{{$post->thumbnail}}">--}}
                    {{--Як я і говорив в листі чомусь не працює фейкер зображень. На скільки я зрозумів впва сайт, яким користувався фейкер.--}}

                    <img src="https://picsum.photos/320/260" class="border-0 rounded"> {{--Тимчасовий варіант--}}
                </div>

                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="fw-bold text-xxl-center text-black-50">{{ $post->title }}</h2>
                    <p class="text-sm-center fw-normal text-muted px-2 me-1 my-3">
                        {!! $post->description !!}
                    </p>
                </div>
            </div>

            <div>
                <section class="rounded-3 mt-4">
                    {{--Comment form section--}}
                    <form method="POST" action="{{route('comment', $post->id)}}">
                        @csrf

                        <textarea name="text" class="w-100 shadow p-4 border-0 mb-1 rounded-3 text-xl-center @error('text') border-red-500 @enderror" placeholder="Your comment..." maxlength="150" spellcheck="false"></textarea>

                        @error('text')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-outline-success w-100 h-25"> Comment </button>

                    </form>

                    {{--Comments section--}}

                    <div id="task-comments" class="pt-4">
                        @foreach($post->comments as $comment)
                            <div class="bg-white rounded-3 p-3 d-flex justify-center items-center align-items-start shadow-lg mb-4">
                                <div class="flex flex-row justify-center mr-2">
                                    <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left ">{{ $comment->user->name }}</h3>
                                </div>

                                <p style="width: 90%" class="text-muted text-lg-center text-start ">{{ $comment->text }}</p>
                            </div>
                        @endforeach
                    </div>

                </section>
            </div>
        </div>
    </div>

@endsection
