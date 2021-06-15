@extends('layout')

@section('title', 'Import Dokter')

@section('content')

<a href="{{ route('dokter0214.create') }}">Tambahkan File Excel</a>

<table style="margin-left:auto;margin-right:auto" position="absolute" border="4" width="400px">
        <thead>
            <th bgcolor="blue" align="center">Nomor</th>
            <th bgcolor="blue" align="center">Nama</th>
            <th bgcolor="blue" align="center">Jabatan</th>
        </thead>
    <tbody>@foreach($dokter as $dokter)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->jabatan }}</td>
                <td> 
                    <form action="{{ route('dokter0214.destroy', $dokter->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button onclick="return confirm('Apakah Anda ingin menghapus data ini #{{ $dokter->id }}?')">
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