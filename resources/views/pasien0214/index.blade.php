@extends('layout')

@section('content')

<a href="{{ route('pasien0214.create') }}">Tambahkan File Excel</a>

<table style="margin-left:auto;margin-right:auto" position="absolute" border="4" width="400px">
        <thead>
            <th bgcolor="blue" align="center">Nomor</th>
            <th bgcolor="blue" align="center">Nama</th>
            <th bgcolor="blue" align="center">Alamat</th>
        </thead>
    <tbody>@foreach($pasien as $pasien)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td> 
                    <form action="{{ route('pasien0214.destroy', $pasien->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button onclick="return confirm('Apakah Anda ingin menghapus data ini #{{ $pasien->id }}?')">
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