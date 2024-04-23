<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PurchaseOrder::join('users','users.id','purchase_orders.user_id')
        ->select('users.name','purchase_orders.*')
        ->get();
        return view('purchase-order/index',compact('data'));
    }

    public function laporan()
    {
        $data = PurchaseOrder::join('users','users.id','purchase_orders.user_id')->where('status','Selesai')->get();
        return view('purchase-order/laporan',compact('data'));
    }

    public function cetak()
    {
        $data = PurchaseOrder::join('users','users.id','purchase_orders.user_id')->where('status','Selesai')->get();
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('purchase-order.pdf', compact('data'))->render());

        // (Opsi) Atur ukuran dan orientasi halaman
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Tampilkan atau unduh PDF
        return $dompdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase-order/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Validasi
        $request->validate([
            'nama_perusahaan' =>  'required',
            'file' => 'required',
        ]);

        $filename = time() . '.' . $request->file->extension();
        $request->file->move(public_path('file'), $filename);

        $data = new PurchaseOrder();
        $data->user_id = Auth::user()->id;
        $data->nama_perusahaan = $request->nama_perusahaan;
        $data->file = $filename;
        $data->save();

        return redirect()->route('purchase-order.index')
                        ->with('success','PO Berhasil Dibuat');
    }

    public function status($status,$id){
        $data = PurchaseOrder::find($id);
        if($status == 'proses'){
            $data->status = "Proses";
        }else if($status == 'batal'){
            $data->status = "Batal";
        }else if($status == 'selesai'){
            $data->status = "Selesai";
        }
        $data->save();
        return redirect()->route('purchase-order.index')
                        ->with('success','Status PO Berhasil Diubah');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $data = PurchaseOrder::findOrFail($user_id);
        $data->delete();
        return redirect()->route('purchase-order.laporan')->with('success','Purchase Order Berhasil Dihapus');
    }
}