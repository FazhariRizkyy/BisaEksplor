<?php

namespace App\Http\Controllers;

use App\Models\Paket_Tour;
use Illuminate\Http\Request;

class Paket_TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $paket_tour = Paket_Tour::paginate(5);
            return view('page.paket_tour.index')->with([
                'paket_tour' => $paket_tour,
            ]);
        } catch (\Exception $e) {
            echo "<script>console.error('PHP Error: "
                . addslashes($e->getMessage()) . "');</script>";
            return view('error.index');
        }
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
        try{
            $data = [
                'nama_paket' => $request->input('nama_paket'),
                'deskripsi_tour' => $request->input('deskripsi_tour'),
                'lokasi_tour' => $request->input('lokasi_tour'),
                'harga_tour' => $request->input('harga_tour'),
                'durasi_tour' => $request->input('durasi_tour'),
            ];
        
            Paket_Tour::create($data);
        
            return back()->with('message_delete', 'Data Paket Tour Sudah dibuat');
        }catch (\Exception $e) {
            return redirect()->route('error.index')
                ->with('error_message', 'Terjadi kesalahan saat menambahkan data: ' . $e->getMessage());
        }
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
        try {
            $data = [
                'nama_paket' => $request->input('nama_paket'),
                'deskripsi_tour' => $request->input('deskripsi_tour'),
                'lokasi_tour' => $request->input('lokasi_tour'),
                'harga_tour' => $request->input('harga_tour'),
                'durasi_tour' => $request->input('durasi_tour'),
            ];

            $datas = Paket_Tour::findOrFail($id);
            $datas->update($data);

            return back()->with('message_delete', 'Data Supplier Sudah diubah');
        } catch (\Exception $e) {
            return redirect()->route('paket_tour.index')
                ->with('error_message', 'Terjadi kesalahan saat melakukan update data: ' . $e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = Paket_Tour::findOrFail($id);
                $data->delete();
                return back()->with('message_delete', 'Data Paket Tour Sudah dihapus');
        }catch(\Exception $e){
            return back()->with('error_message', 'Terjadi kesalahan saat melakukan update data:' . $e->getMessage());
        }
    }
}


