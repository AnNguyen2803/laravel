@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>ID_KH</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->id_kh }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <!-- Adjust these links according to your routes -->
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.users.edit', ['user' => $user->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn btn-danger btn-sm" href="javascript:void(0);" onclick="removeRow('{{ $user->id }}', '/admin/users/destroy/{{ $user->id }}')">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }} <!-- Adjust pagination view as per your setup -->
@endsection
