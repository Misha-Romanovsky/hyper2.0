@extends('layouts.admin')

@section('title', isset($post) ? "Edit post ID {$post->id}" : 'Add post')

@section('content')

    <div class="container mx-auto px-5 py-5">
        <h3 class="text-secondary text-xxl-center fs-3">{{ isset($post) ? "Edit post ID {$post->id}" : 'Add post' }}</h3>


        <div class="mt-5">
            <form enctype="multipart/form-data" class="mt-5" method="POST" action="{{ isset($post) ? route("admin.posts.update", $post->id) : route("admin.posts.store") }}">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif

                <input name="title" type="text" class="w-100 border border-secondary rounded mb-2 px-3 @error('title') border-danger @enderror" placeholder="Title" minlength="70" value="{{ $post->title ?? '' }}" />

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input name="preview" type="text" class="w-100 border border-secondary rounded mb-2 px-3 @error('preview') border-danger @enderror" placeholder="Preview" value="{{ $post->preview ?? '' }}" />

                @error('preview')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input name="description" type="text" class="w-100 border border-secondary rounded mb-2 px-3 @error('description') border-danger @enderror" placeholder="Description" value="{{ $post->description ?? '' }}" />

                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                @if(isset($post) && $post->thumbnail)
                    <div>
                        <img class="h-50 w-50" src="{{ $post->thumbnail }}">
                    </div>
                @endif

                <input name="thumbnail" type="file" class="w-100 h-100" placeholder="Image" />

                @error('thumbnail')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-success mt-2">Save</button>
            </form>
        </div>
    </div>

@endsection
