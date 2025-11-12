<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PasienController extends Controller
{
    
    public function index()
    {

        $pasiens = Pasien::with('rumahSakit')->get();

        return view('pasien.pasienView', compact('pasiens'));
    }

    public function create()
    {
        $rumahsakits = RumahSakit::all();
        return view('pasien.pasienCreate', compact('rumahsakits'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Pasien::create($data);

        return redirect('/pasien')
                         ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        $rumahsakits = RumahSakit::all();

        return view('pasien.pasienEdit', compact('pasien', 'rumahsakits'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $data = $request->all();

        $pasien->update($data);

        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['message' => 'Data pasien berhasil dihapus.']);
        }
        return redirect()->route('pasien.index')
                         ->with('success', 'Data pasien berhasil dihapus.');
    }
}
