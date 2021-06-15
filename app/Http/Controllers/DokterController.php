<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DokterImport;
use App\Models\Dokter;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dokter = Dokter::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', 'like', "%{$request->cari}%");
        })->paginate(5);

        $dokter->appends($request->only('cari'));

        return view('dokter0214.index', [
            'dokter' => $dokter,
        ])
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();

        return redirect()->route('dokter0214.index')
                ->with('success','Dokter berhasil dihapus');
    }

    /**
    * Import file excel to database
    */
    public function create()
    {
        return view('dokter0214.create');
    }

    /**
     * Import file excel to database
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_excel' => 'required',
        ]);

        Excel::import(new DokterImport, $request->file('file_excel'));

        return redirect()->route('dokter.index0214')
        ->with('success','Berhasil mengimport ke Dokter');
    }
}
