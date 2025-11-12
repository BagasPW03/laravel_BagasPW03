<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use App\Http\Requests\StoreRumahSakitRequest;
use App\Http\Requests\UpdateRumahSakitRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rumahsakit = RumahSakit::orderBy('id', 'desc')->paginate(10);
        return view('RumahSakit.rumahSakitView', compact('rumahsakit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('RumahSakit.rumahSakitCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        RumahSakit::create($request->all());
        return redirect("/rumahsakit")->with('success', 'Data rumah sakit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RumahSakit $rumahSakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rumahsakit = RumahSakit::findOrFail($id);
        return view('RumahSakit.rumahSakitEdit', compact('rumahsakit'));
    }

    public function update(Request $request, $id)
    {


        $rumahsakit = RumahSakit::findOrFail($id);
        $rumahsakit->update($request->all());

        return redirect()->route('rumahsakit.index')
            ->with('success', 'Data rumah sakit berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rumahsakit = RumahSakit::findOrFail($id);
        $rumahsakit->delete();
        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
