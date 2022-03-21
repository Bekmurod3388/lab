
@extends('admin.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="300px">Action</th>
        </tr>

        @if(isset($data))
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
                    <a class="btn btn-success" href="{{ route('admin.users.destroy',$user->id) }}"> Delete</a>
                </td>
            </tr>
        @endforeach
        @endif
    </table>
@endsection
