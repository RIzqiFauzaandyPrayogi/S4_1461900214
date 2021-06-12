<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
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

        return view('dokter.index0214', [
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
        Excel::import(new UsersImport, request()->file('file_excel'));
        $dokter->delete();

        return redirect()->route('dokter.index0214')
                ->with('success','Dokter berhasil dihapus');
    }

    /**
     * Import file excel to database
     */
    public function import()
    {
        Excel::import(new UsersImport, request()->file('file_excel'));

        return redirect()->route('dokter.index0214')
                ->with('success','Berhasil mengimport ke Dokter');
    }
}
