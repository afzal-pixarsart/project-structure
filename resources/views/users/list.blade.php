@extends('layouts')
  
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="card-header"><h5>{{ __('Users List') }}</h5></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{route('edit-user', [$user->id])}}">Edit</a>
                            @if($user->type != 'admin')
                                <a class="btn btn-primary btn-sm" href="{{route('delete-user', $user->id)}}" onclick="return confirm('Are you sure?')">Delete</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
