@extends('layouts.admin')

@section('title', 'Admins')

@section('content')

    <div class="container mx-auto px-5 py-5">

        <h3 class="text-secondary text-xxl-center fs-3">Posts</h3>

        <div class="mt-5">
            <a href="{{route('admin.admin_users.create')}}" class="btn btn-dark"> Add Admin</a>
        </div>

        <div class="d-flex flex-column mt-2">
            <div class="d-inline-block align-middle shadow rounded border border-secondary">
                <table class="table table-striped overflow-auto">
                    <thead>
                    <tr>
                        <th class="px-5 py-3 border-bottom border-secondary bg-secondary text-start fs-4 text-dark text-uppercase ">
                            Email
                        </th>
                        <th class="px-5 py-3 border-bottom border-secondary bg-secondary"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-5 py-4 text-nowrap border-bottom border-secondary">
                                <div class="text-sm-start text-secondary">{{$user->email}}</div>
                            </td>
                            <td class="px-5 text-nowrap text-end border-bottom border-secondary fs-3 ">
                                <a href="{{route('admin.admin_users.edit', $user->id)}}" class="btn btn-light">Edit</a>
                                <form action="{{ route("admin.admin_users.destroy", $user->id) }}" method="POST">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-dark">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
