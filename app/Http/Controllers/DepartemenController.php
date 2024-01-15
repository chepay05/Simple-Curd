<?php

namespace App\Http\Controllers;

use App\Models\departemen;
use App\Models\karyawan_departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departemen = departemen::all();
        return view('Departemen.index', compact('departemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemen = new departemen();
        return view('Departemen.create', compact('departemen'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'Id_Departemen' => 'required',
            'Nama_departemen' => 'required',
        ]);

        departemen::create([
            'Id_Departemen' => $request->Id_Departemen,
            'Nama_departemen' => $request->Nama_departemen,
        ]);

        return redirect()->route('departemen-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = departemen::find($id);
        $departemen = $data;
        return view('Departemen.edit', compact('departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $departemen = departemen::find($id);

        $request->validate([
            'Id_Departemen' => 'required',
            'Nama_departemen' => 'required',
        ]);

        $departemen->update([
            'Id_Departemen' => $request->Id_Departemen,
            'Nama_departemen' => $request->Nama_departemen,
        ]);
        return redirect()->route('departemen-index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $departemen = departemen::find($id);

        $isReferenced = karyawan_departemen::where('Id_Departemen', $id)->exists();

        if ($isReferenced) {
            return redirect()->route('departemen-index');
        } else {
            $departemen->delete();
            return redirect()->route('departemen-index');
        }
        return redirect()->route('departemen-index')->with('error', 'Data not found');
    }
}
