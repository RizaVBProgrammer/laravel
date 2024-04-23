<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BiayaOperasional;
use PDF;

class BiayaOperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BiayaOperasional::get();
        return view('biaya-operasional.index', compact('data'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biaya-operasional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        // Simpan data ke database
        $pengeluaranBbm = new BiayaOperasional(); // Gunakan model BBM
        $pengeluaranBbm->tanggal = $request->tanggal;
        $pengeluaranBbm->keterangan = $request->keterangan;
        $pengeluaranBbm->jumlah = $request->jumlah;
        $pengeluaranBbm->save();

        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $biayaOperasional = BiayaOperasional::find($id);
        return view('biaya-operasional/show',compact('biayaOperasional'));
    }

    public function status(Request $request)
    {
        // Logic for updating status
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $biayaOperasional = BiayaOperasional::findOrFail($id);
        return view('biaya-operasional.edit', compact('biayaOperasional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
            'jumlah' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);
    
        // Dapatkan data yang ada berdasarkan ID
        $biayaOperasional = BiayaOperasional::findOrFail($id);
    
        // Perbarui data yang ada
        $biayaOperasional->tanggal = $request->tanggal;
        $biayaOperasional->keterangan = $request->keterangan;
        $biayaOperasional->jumlah = $request->jumlah;
    
        // Simpan perubahan
        $biayaOperasional->save();
    
        // Redirect ke halaman yang sesuai
        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $biayaOperasional = BiayaOperasional::findOrFail($id);
        $biayaOperasional->delete();

        return redirect()->route('biaya-operasional.index')->with('success', 'Biaya Operasional Berhasil di Hapus.');
    }
    public function filter(Request $request)
    {
        $query = BiayaOperasional::query();

        if ($request->has('tanggal')) {
            $query->whereDate('tanggal', $request->tanggal);
        }

        if ($request->has('keterangan')) {
            $query->where('keterangan', 'like', '%' . $request->keterangan . '%');
        }

        // Tambahkan filter lainnya sesuai kebutuhan

        $data = $query->get();

        return view('biaya-operasional.index', compact('data'));
    }
    public function generatePDF()
    {
        $data = BiayaOperasional::get();
        return view('biaya-operasional/laporan',compact('data'));
    }
    public function cetak()
    {
        $data = Invoice::get();
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('biaya-operasional.biaya-summary', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    
    
}

