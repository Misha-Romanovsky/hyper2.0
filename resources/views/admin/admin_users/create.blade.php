@extends('layouts.admin')

@section('title', isset($user) ? "Edit User ID {$user->id}" : 'Add User')

@section('content')

    <div class="container mx-auto px-5 py-5">
        <h3 class="text-secondary text-xxl-center fs-3">{{ isset($user) ? "Edit User ID {$user->id}" : 'Add User' }}</h3>


        <div class="mt-5">
            <form enctype="multipart/form-data" class="mt-5" method="POST" action="{{ isset($user) ? route("admin.admin_users.update", $user->id) : route("admin.admin_users.store") }}">
                @csrf

                @if(isset($user))
                    <input type="hidden" name="id" value="{{$user->id}}">

                    @method('PUT')
                @endif

                <input name="email" type="email" class="w-100 border border-secondary rounded mb-2 px-3 @error('email') border-danger @enderror" placeholder="Email" value="{{ $user->email ?? '' }}" />

                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input name="name" type="text" class="w-100 border border-secondary rounded mb-2 px-3 @error('name') border-danger @enderror" placeholder="Name" value="{{ $user->name ?? '' }}" />

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <input name="password" type="password" autocomplete="new-password" class="w-100 border border-secondary rounded mb-2 px-3 @error('password') border-danger @enderror" placeholder="Password" value="" />
                <input name="password_confirmation" type="password" autocomplete="new-password" class="w-100 border border-secondary rounded mb-2 px-3 @error('password') border-danger @enderror" placeholder="Password confirmation" value="" />

                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-success mt-2">Save</button>
            </form>
        </div>
    </div>

@endsection
