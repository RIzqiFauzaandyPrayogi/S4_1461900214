<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImport;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::when($request->cari, function ($query) use ($request) {
            $query
            ->where('nama', 'like', "%{$request->cari}%");
        })->paginate(5);

        $user->appends($request->only('cari'));

        return view('user.index0214', [
            'user' => $user,
        ])
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Excel::import(new UserImport, request()->file('file_excel'));
        $user->delete();

        return redirect()->route('user.index0214')
                ->with('success','User berhasil dihapus');
    }

    /**
     * Import file excel to database
     */
    public function import()
    {
        Excel::import(new UserImport, request()->file('file_excel'));

        return redirect()->route('user.index0214')
                ->with('success','Berhasil mengimport ke User');
    }
}
