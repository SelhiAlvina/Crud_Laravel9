<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(10);

        //render view with karyawan
        return view('karyawans.index', compact('karyawans'));
    }
        
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('karyawans.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_karyawan'     => 'required|min:1',
            'jk_karyawan'       => 'required|string',
            'dob_karyawan'      => 'required',
            'alamat_karyawan' => 'required|min:1'
        ]);

        //create data anggota
        Karyawan::create([
            'nama_karyawan'     => $request->nama_karyawan,
            'jk_karyawan'       => $request->jk_karyawan,
            'dob_karyawan'      => $request->dob_karyawan,
            'alamat_karyawan' => $request->alamat_karyawan
        ]);

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        
    /**
     * edit
     *
     * @param  mixed $karyawan
     * @return void
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $karyawan
     * @return void
     */

    public function update(Request $request, Karyawan $karyawan)
    {
        //validate form
        $this->validate($request, [
            'nama_karyawan'     => 'required|min:1',
            'jk_karyawan'       => 'required',
            'dob_karyawan'      => 'required',
            'alamat_karyawan' => 'required|min:1'
        ]);

            //update post with new image
            $karyawan->update([
            'nama_karyawan'     => $request->nama_karyawan,
            'jk_karyawan'       => $request->jk_karyawan,
            'dob_karyawan'      => $request->dob_karyawan,
            'alamat_karyawan' => $request->alamat_karyawan
            ]);

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

        
    /**
     * destroy
     *
     * @param  mixed $karyawan
     * @return void
     */
    public function destroy(Karyawan $karyawan)
    {

        //delete data karyawan
        $karyawan->delete();

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}