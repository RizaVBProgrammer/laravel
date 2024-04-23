<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BBM;

class PengeluaranBbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BBM::get();
        return view('pengeluaran-bbm.index', compact('data'));
    }

    public function create()
    {
        // Logic for create form
        return view('pengeluaran-bbm.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'no_invoice' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'wilayah_pengisian' => 'required|string|max:255',
            'qty' => 'required|integer',
            'satuan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Simpan data ke database
        $pengeluaranBbm = new BBM(); // Gunakan model BBM
        $pengeluaranBbm->nama_perusahaan = $request->nama_perusahaan;
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->no_invoice = $request->no_invoice;
        $pengeluaranBbm->produk = $request->produk;
        $pengeluaranBbm->wilayah_pengisian = $request->wilayah_pengisian;
        $pengeluaranBbm->qty = $request->qty;
        $pengeluaranBbm->satuan = $request->satuan;
        $pengeluaranBbm->harga = $request->harga;
        $pengeluaranBbm->total = $request->total;
        $pengeluaranBbm->save();

        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data pengeluaran BBM berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengeluaranBbm = BBM::findOrFail($id);
        return view('pengeluaran-bbm.edit', compact('pengeluaranBbm'));
    }

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'no_invoice' => 'required|string|max:255',
            'produk' => 'required|string|max:255',
            'wilayah_pengisian' => 'required|string|max:255',
            'qty' => 'required|integer',
            'satuan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
    
        // Dapatkan data yang ada berdasarkan ID
        $pengeluaranBbm = BBM::findOrFail($id);
    
        // Perbarui data yang ada
        $pengeluaranBbm->nama_perusahaan = $request->nama_perusahaan;
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->no_invoice = $request->no_invoice;
        $pengeluaranBbm->produk = $request->produk;
        $pengeluaranBbm->wilayah_pengisian = $request->wilayah_pengisian;
        $pengeluaranBbm->qty = $request->qty;
        $pengeluaranBbm->satuan = $request->satuan;
        $pengeluaranBbm->harga = $request->harga;
        $pengeluaranBbm->total = $request->total;
    
        // Simpan perubahan
        $pengeluaranBbm->save();
    
        // Redirect ke halaman yang sesuai
        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data pengeluaran BBM berhasil diubah.');
    }
    

    public function destroy($id)
    {
        // Find and delete the purchase order
        $purchaseOrder = BBM::findOrFail($id);
        $purchaseOrder->delete();

        return redirect()->route('pengeluaran-bbm.index')->with('success', 'Data Pengeluaran BBM Berhasil di Hapus.');
    }
    public function show(string $id)
    {
        $pengeluaranBbm = BBM::find($id);
        return view('pengeluaran-bbm/show',compact('pengeluaranBbm'));
    }

    public function status(Request $request)
    {
        // Logic for updating status
    }
}
