@extends('layout')

@section('content')

<a href="{{ route('user0214.create') }}">Tambahkan File Excel</a>

<table style="margin-left:auto;margin-right:auto" position="absolute" border="4" width="400px">
        <thead>
            <th bgcolor="blue" align="center">Nomor</th>
            <th bgcolor="blue" align="center">Nama</th>
            <th bgcolor="blue" align="center">Username</th>
            <th bgcolor="blue" align="center">Password</th>
        </thead>
    <tbody>@foreach($user as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->password }}</td>
                <td> 
                    <form action="{{ route('user0214.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button onclick="return confirm('Apakah Anda ingin menghapus data ini #{{ $user->id }}?')">
                                Hapus
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
    </tbody>
    @endforeach
</table>
@stop