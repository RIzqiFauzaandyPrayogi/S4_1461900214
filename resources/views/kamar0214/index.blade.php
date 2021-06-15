@extends('layout')

@section('content')

<a href="{{ route('kamar0214.create') }}">Tambahkan File Excel</a>

<table style="margin-left:auto;margin-right:auto" position="absolute" border="4" width="400px">
        <thead>
            <th bgcolor="blue" align="center">Nomor</th>
            <th bgcolor="blue" align="center">ID Pasien</th>
            <th bgcolor="blue" align="center">ID Dokter</th>
        </thead>
    <tbody>@foreach($kamar as $kamar)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kamar->id_pasien }}</td>
                <td>{{ $kamar->id_dokter }}</td>
                <td> 
                    <form action="{{ route('kamar0214.destroy', $kamar->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button onclick="return confirm('Apakah Anda ingin menghapus data ini #{{ $kamar->id }}?')">
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