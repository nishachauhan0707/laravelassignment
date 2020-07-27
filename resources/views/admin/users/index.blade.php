@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users') }}<span style="float:right;"><a style="float:right;" href="#">Add New User</a></span></div>

                <div class="card-body">
                   
                   <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                          <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->email }}</td>
                             <td>{{ implode(',',$user->roles()->get()->Pluck('name')->toArray()) }}</td>
                            <td>
                                @can('edit-users')
                                <a href="{{ route('admin.users.edit',$user->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                @endcan
                                 @can('delete-users')
                                <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="float-left">
                                    @csrf
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                 @endcan
                            </td>
                          </tr> 
                        </tbody>
                        @endforeach
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
