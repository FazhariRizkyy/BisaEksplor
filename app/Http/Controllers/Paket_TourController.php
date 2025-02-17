<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Paket_Tour;
use Illuminate\Http\Request;

class Paket_TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_tour = Paket_Tour::all();
        return view('page.paket_tour.index')->with([
            'paket_tour' => $paket_tour
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi_tour' => $request->input('deskripsi_tour'),
            'lokasi_tour' => $request->input('lokasi_tour'),
            'harga_tour' => $request->input('harga_tour'),
            'durasi_tour'=> $request->input('durasi_tour'),
            'image' => $request->input('image')
        ];
        Paket_Tour::create($data);
        return back()->with('message_add', 'Paket Tour Sudah Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama_paket' => $request->input('nama_paket'),
            'deskripsi_tour' => $request->input('deskripsi_tour'),
            'lokasi_tour' => $request->input('lokasi_tour'),
            'harga_tour' => $request->input('harga_tour'),
            'durasi_tour'=> $request->input('durasi_tour'),
            'image' => $request->input('image')
        ];
        Paket_Tour::create($data);
        return back()->with('message_add', 'Paket Tour Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Booking::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Paket Tour Sudah dihapus');
    }
}
