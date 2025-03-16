<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pengguna = Pengguna::paginate(5);
            return view('page.pengguna.index')->with([
            'pengguna' => $pengguna,
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
        $data = [
            'nama_pengguna' => $request->input('nama_pengguna'),
            'email_pengguna' => $request->input('email_pengguna'),
            'password_pengguna' => $request->input('password_pengguna'),
            'nomer_handphone' => $request->input('nomer_handphone')
        ];

        Pengguna::create($data);

        return back()->with('message_delete', 'Data Pengguna Sudah dihapus');
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
            'nama_pengguna' => $request->input('nama_pengguna'),
            'email_pengguna' => $request->input('email_pengguna'),
            'password_pengguna' => $request->input('password_pengguna'),
            'nomer_handphone' => $request->input('nomer_handphone')
        ];

        $datas = Pengguna::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Pengguna Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pengguna::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Suppier Sudah dihapus');
    }
}
