<div>
    <form action="{{ route('dokter.store') }}" method="POST" enctype="multiport/from-data">
        @csrf
        <label for="file">Pilih Excel</label><br></br>
        <input type="file" id="file" name="file" accept=".csv, ">
        <button type="submit" value="submit">import</button>
    </form>
</div>