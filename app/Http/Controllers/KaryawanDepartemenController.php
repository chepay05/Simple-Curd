<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\Karyawan;
use App\Models\karyawan_departemen;
use Illuminate\Http\Request;

class KaryawanDepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawanDepartemen = karyawan_departemen::all();
        return view('karyawan_departemen.index', compact('karyawanDepartemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $max = karyawan_departemen::max('Kode');
        $karyawan_departemen = new karyawan_departemen();
        $karyawan_departemen->Kode = $max + 1;
        $karyawanList = Karyawan::all();
        $departemenList = Departemen::all();

        return view('karyawan_departemen.create', compact('karyawanList', 'departemenList', 'karyawan_departemen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|exists:karyawan,NIP',
            'Id_Departemen' => 'required|exists:departemen,Id_Departemen',
            'Kode' => 'required', // Assuming 'Kode' is your primary key in 'karyawan_departemen'
        ]);

        // Get existing karyawan and departemen data
        $karyawan = Karyawan::find($request->NIP);
        $departemen = Departemen::find($request->Id_Departemen);

        // Make sure 'Kode' is provided in the request or generate it as needed
        $kode = $request->Kode ?? (karyawan_departemen::max('Kode') + 1);

        // Create karyawan_departemen entry
        karyawan_departemen::create([
            'Kode' => $kode,
            'NIP' => $karyawan->NIP,
            'Id_Departemen' => $departemen->Id_Departemen,
        ]);

        // Provide feedback to the user
        return redirect()->route('karyawan_departemen.index')->with('success', 'Karyawan_Departemen created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(karyawan_departemen $karyawan_departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Tampilkan nilai $id untuk debugging
        // dd($id);

        // Cari data berdasarkan id, bukan 'Kode'
        $karyawanDepartemen = karyawan_departemen::find($id);

        // Ambil daftar karyawan dan departemen
        $karyawanList = Karyawan::all();
        $departemenList = Departemen::all();

        return view('karyawan_departemen.edit', compact('karyawanDepartemen', 'karyawanList', 'departemenList'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $karyawanDepartemen = karyawan_departemen::where('Kode', $id)->first();
        $request->validate([
            'NIP' => 'required',
            'Id_Departemen' => 'required',
        ]);

        $karyawanDepartemen->update([
            'NIP' => $request->NIP,
            'Id_Departemen' => $request->Id_Departemen,
        ]);
        return redirect()->route('karyawan_departemen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $karyawanDepartemen = karyawan_departemen::find($id);
        $karyawanDepartemen->delete();
        return redirect()->route('karyawan_departemen.index')->with('success', 'Data deleted successfully!');
    }
}
