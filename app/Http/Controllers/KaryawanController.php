<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\karyawan_departemen;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required',
            'Nama' => 'required',
            'Jabatan' => 'required',
            'Gaji' => 'integer',
        ]);
        // dd($request);

        Karyawan::create([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Jabatan' => $request->Jabatan,
            'Gaji' => $request->Gaji,
        ]);
        return redirect()->route('index')->with('success', 'Data updated successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Karyawan::find($id);
        $karyawan = $data;
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        $request->validate([
            'NIP' => 'required',
            'Nama' => 'required',
            'Jabatan' => 'required',
            'Gaji' => 'integer',
        ]);

        $karyawan->update([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Jabatan' => $request->Jabatan,
            'Gaji' => $request->Gaji,
        ]);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $karyawan = Karyawan::find($id);

        // Check if there is a reference in karyawan_departemen
        $isReferenced = karyawan_departemen::where('NIP', $id)->exists();

        if ($isReferenced) {
            return redirect()->route('index')->with('error', 'Data karyawan tidak dapat dihapus karena masih terkait dengan departemen.');
        } else {
            // Jika tidak ada referensi, maka hapus data karyawan
            $karyawan->delete();
            return redirect()->route('index')->with('success', 'Data karyawan berhasil dihapus.');
        }
    }
}
