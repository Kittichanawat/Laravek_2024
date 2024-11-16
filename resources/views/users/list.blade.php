@extends('layout')

@section('content')

<h1>Users List </h1>

<a href="/users/form " class="btn btn-primary" >
    <i class="fa-solid fa-user-plus"></i>
Create User
</a>

@if (isset($users))
    <table class="table table-bordered table-striped mt-3" width="50%">
        <thead>
            <tr>
             <th>Name</th>   
             <th>Email</th>      
             <th width = "110px">Actions</th>
            </tr>    
        </thead> 
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                     <form action="/users/{{$user->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="/users/{{$user->id}}/edit " class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>

                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i>

                        </button>
                     </form>
                    </td>
                </tr>
            @endforeach
    </table>
@endif
@endsection
