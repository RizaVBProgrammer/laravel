<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SuratJalan::get();
        return view('surat-jalan/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastSuratJalan = SuratJalan::latest()->first(); // Mengambil data terbaru dari database
        $lastSuratJalanNumber = $lastSuratJalan ? $lastSuratJalan->no_surat : '000/SJ-AKPS/' . Carbon::now()->format('m/y'); // Jika tidak ada data sebelumnya, nomor invoice akan dimulai dengan 000
        
        // Menganalisis nomor invoice terakhir untuk menentukan nomor berikutnya
        preg_match('/(\d{3})\/SJ-AKPS\/(\d{1,2})\/(\d{2})/', $lastSuratJalanNumber, $matches);
        
        // Menentukan nomor berikutnya
        if (!empty($matches)) {
            $SuratJalanIndex = $matches[1];
            $month = $matches[2];
            $year = $matches[3];
            $currentYear = Carbon::now()->format('y');

            if ($year == $currentYear && $month == Carbon::now()->format('m')) {
                $newIndex = str_pad($SuratJalanIndex + 1, 3, '0', STR_PAD_LEFT);
            } else {
                $newIndex = '001';
            }
        } else {
            $newIndex = '001';
        }

        // Membuat format string yang sesuai dengan nomor invoice baru
        $newSuratJalanNumber = $newIndex . '/SJ-AKPS/' . Carbon::now()->format('m/y');

        return view('surat-jalan/create',compact('newSuratJalanNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kepada' => 'required|string',
            'up' => 'required|string',
            'tanggal' => 'required|date',
            'no_surat' => 'required|string',
            'no_po' => 'required|string',
            'tujuan' => 'required|string',
            'contact' => 'required|string',
            'no_telp' => 'required|string',
            'qty' => 'required|string',
            'jenis' => 'required|string',
            'nama_transportir' => 'required|string',
            'segel_atas' => 'required|string',
            'segel_bawah' => 'required|string',
            'plat' => 'required|string',
            'pengirim' => 'required|string',
        ]);

        // Simpan data surat jalan ke dalam database
        $data = new SuratJalan();
        $data->kepada = $request->kepada;
        $data->up = $request->up;
        $data->tanggal = $request->tanggal;
        $data->no_surat = $request->no_surat;
        $data->no_po = $request->no_po;
        $data->tujuan = $request->tujuan;
        $data->contact = $request->contact;
        $data->no_telp = $request->no_telp;
        $data->qty = $request->qty;
        $data->jenis = $request->jenis;
        $data->nama_transportir = $request->nama_transportir;
        $data->segel_atas = $request->segel_atas;
        $data->segel_bawah = $request->segel_bawah;
        $data->plat = $request->plat;
        $data->pengirim = $request->pengirim;
        $data->save();

        // Redirect ke halaman invoice dengan pesan sukses
        return redirect()->route('surat-jalan.index')->with('success', 'Surat Jalan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suratJalan = SuratJalan::find($id);
        return view('surat-jalan/show',compact('suratJalan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suratJalan = SuratJalan::find($id);
        return view('surat-jalan/edit',compact('suratJalan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kepada' => 'required|string',
            'up' => 'required|string',
            'tanggal' => 'required|date',
            'no_surat' => 'required|string',
            'no_po' => 'required|string',
            'tujuan' => 'required|string',
            'contact' => 'required|string',
            'no_telp' => 'required|string',
            'qty' => 'required|numeric',
            'jenis' => 'required|string',
            'nama_transportir' => 'required|string',
            'segel_atas' => 'required|string',
            'segel_bawah' => 'required|string',
            'plat' => 'required|string',
            'pengirim' => 'required|string',
        ]);

        // Ambil data surat jalan berdasarkan ID
        $suratJalan = SuratJalan::findOrFail($id);

        // Update data surat jalan berdasarkan request
        $suratJalan->update($request->all());

        // Redirect ke halaman edit surat jalan dengan pesan sukses
        return redirect()->route('surat-jalan.index')->with('success', 'Surat jalan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = SuratJalan::find($id);
        $data->delete();
        return redirect()->route('surat-jalan.index') ->with('success','Surat Jalan Berhasil Dihapus');
    }
    public function laporan()
    {
        $data = SuratJalan::get();
        return view('surat-jalan/laporan',compact('data'));
    }
}
