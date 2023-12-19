@extends('layouts')
  
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Create User') }}</h5></div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{route('store-user')}}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control"  aria-describedby="emailHelp">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <!-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Type</label>
                            <input type="text" name="type" class="form-control"  aria-describedby="emailHelp">
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div> -->
                        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" aria-describedby="emailHelp">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Select Role</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check  mb-3" >
                            @foreach($permissions as $permission)
                            <div class="form-check-item"> 
                                <input class="form-check-input" name="permissions[]" type="checkbox" value="{{$permission->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">{{$permission->name}}</label>
                            </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src=
"https://unpkg.com/ag-grid-community/dist/ag-grid-community.min.nostyle.js">
</script>
<script type="text/javascript">
    $('#example-multiple-selected').multiselect();
</script>
@endsection