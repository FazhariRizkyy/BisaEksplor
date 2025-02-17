<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::all();
        return view('page.booking.index')->with([
            'booking' => $booking
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
            'id_pengguna' => $request->input('id_pengguna'),
            'id_paket' => $request->input('id_paket'),
            'tanggal_booking' => $request->input('tanggal_booking'),
            'jumlah_orang' => $request->input('jumlah_orang'),
            'total_harga' => $request->input('total_harga'),
            'status_pembayaran' => $request->input('status_pembayaran'),
            'metode_pembayaran' => $request->input('metode_pembayaran') 
        ];
        Booking::create($data);
        return back()->with('message_add', 'Data Booking Sudah Ditambah');
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
            'id_pengguna' => $request->input('id_pengguna'),
            'id_paket' => $request->input('id_paket'),
            'tanggal_booking' => $request->input('tanggal_booking'),
            'jumlah_orang' => $request->input('jumlah_orang'),
            'total_harga' => $request->input('total_harga'),
            'status_pembayaran' => $request->input('status_pembayaran'),
            'metode_pembayaran' => $request->input('metode_pembayaran') 
        ];

        $datas = Booking::findOrFail($id);
        $datas->update($data);
        return back()->with('message_update', 'Data Booking Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Booking::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Booking Sudah dihapus');
    }
}
