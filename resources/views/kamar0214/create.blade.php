@extends('layout')

@section('title', 'Import Kamar')

@section('content')

<div>
    <form action="{{ route('kamar0214.store') }}" method="POST" enctype="multiport/from-data">
        @csrf
        <label for="file">Pilih Excel</label><br></br>
        <input type="file" id="file" name="file" accept=".xlsx, ">
        <button type="submit" value="submit">import</button>
    </form>
</div>

@stop