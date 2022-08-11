<?php

namespace App\Http\Controllers;

use App\Models\PermintaanPembelian;
use App\Models\CetakPermintaanPembelian;
use App\Models\Tiket;
use App\Models\Karyawan;
use App\Models\SubTiket;
use Illuminate\Http\Request;

class PermintaanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tiket.purchase-requisition.index', [
            'data' => PermintaanPembelian::orderBy('created_at', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiket.purchase-requisition.create', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('kategori_id', 4)->where('status_id', 2)->orderBy('id', 'desc')->get(),
            'karyawan' => Karyawan::all(),
            'sub_tiket' => SubTiket::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tiket_id' => 'required',
            'nama_barang' => 'required',
            'satuan_harga_barang' => 'required',
            'total_harga_barang' => 'required',
            'qty' => 'required',
            'catatan' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'tiket_id.required' => 'Keluhan Tiket harus di isi',
            'nama_barang.required' => 'Nama Barang harus di isi',
            'satuan_harga_barang.required' => 'Satuan Harga Barang harus di isi',
            'total_harga_barang.required' => 'Total Harga Barang harus di isi',
            'qty.required' => 'qty / Jumlah harus di isi',
            'catatan.required' => 'Catatan harus di isi'
        ]);
        PermintaanPembelian::create($validateData);
        return redirect('/admin/purchase-requisition-hardware')->with('success', 'Permintan Pembelian Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermintaanPembelian  $permintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(PermintaanPembelian $permintaanPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermintaanPembelian  $permintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(PermintaanPembelian $permintaanPembelian)
    {
        $explode = explode('/', url()->current());
        return view('admin.tiket.purchase-requisition.edit', [
            'data' => Tiket::where('kode_tiket', '!=', '')->where('kategori_id', 4)->where('status_id', 2)->get(),
            'karyawan' => Karyawan::all(),
            'data_permintaan' => PermintaanPembelian::where('id', $explode[5])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermintaanPembelian  $permintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermintaanPembelian $permintaanPembelian)
    {
        $rules = [
            'nama_barang' => 'required',
            'satuan_harga_barang' => 'required',
            'total_harga_barang' => 'required',
            'qty' => 'required',
            'catatan' => 'required'
        ];
        $validateData = $request->validate($rules, [
            'nama_barang.required' => 'Nama Barang harus di isi',
            'satuan_harga_barang.required' => 'Satuan Harga Barang harus di isi',
            'total_harga_barang.required' => 'Total Harga Barang harus di isi',
            'qty.required' => 'qty / Jumlah harus di isi',
            'catatan.required' => 'Catatan harus di isi'
        ]);
        $explode = explode('/', url()->current());
        PermintaanPembelian::where('id', end($explode))->update($validateData);
        return redirect('/admin/purchase-requisition-hardware')->with('success', 'Permintan Pembelian Berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermintaanPembelian  $permintaanPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermintaanPembelian $permintaanPembelian)
    {
        $explode = explode('/', url()->current());
        PermintaanPembelian::find(end($explode))->delete();
        return back()->with('success', 'Permintaan Pembelian Berhasil dihapus!');
    }

    public function filterPurchaseRequisition()
    {
        $cetak_permintaan_pembelian = CetakPermintaanPembelian::orderBy('id', 'desc')->get();
        $permintaan_pembelian = PermintaanPembelian::orderBy('id', 'desc')->get();
        return view('admin.report.purchase-requisition.filter-tiket', [
            'data' => $cetak_permintaan_pembelian,
            'permintaan_pembelian' => $permintaan_pembelian,
            'jumlah' => count($cetak_permintaan_pembelian) + 1
        ]);
    }

    public function createNotaPurchaseRequisiton(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'kode_barang' => 'required',
            'to_company' => 'required',
            'from_company' => 'required',
            'id_permintaan_pembelian' => 'required',
        ];
        $validateData = $request->validate($rules, [
            'tanggal.required' => 'Tanggal harus di isi',
            'kode_barang.required' => 'Kode Barang harus di isi',
            'to_company.required' => 'Untuk Perusahaan harus di isi',
            'from_company.required' => 'Dari Perusahaan harus di isi',
            'id_permintaan_pembelian.required' => 'Permintaan Pembelian harus di isi',
        ]);

        $validateData['kode_barang'] = $request->kode_barang;
        $validateData['id_permintaan_pembelian'] = implode(',', $request->id_permintaan_pembelian);
        CetakPermintaanPembelian::create($validateData);

        return back()->with('success', 'Nota Permintaan Pembelian Berhasil ditambahkan!');
    }
    public function printPurchaseRequisiton()
    {
        $explode = explode('/', url()->current());
        $cetak_permintaan_pembelian = CetakPermintaanPembelian::where('kode_barang', end($explode))->get();
        $explode_data = explode(',', $cetak_permintaan_pembelian[0]['id_permintaan_pembelian']);
        $permintaan_pembelian = PermintaanPembelian::whereIn('id', $explode_data)->get();
        return view('admin.report.purchase-requisition.print-tiket', [
            'data' => $cetak_permintaan_pembelian[0],
            'permintaan_pembelian' => $permintaan_pembelian,
        ]);
    }

    public function infoPurchaseRequisiton()
    {
        $explode = explode('/', url()->current());
        $cetak_permintaan_pembelian = CetakPermintaanPembelian::where('kode_barang', end($explode))->get();
        $explode_data = explode(',', $cetak_permintaan_pembelian[0]['id_permintaan_pembelian']);
        $permintaan_pembelian = PermintaanPembelian::whereIn('id', $explode_data)->get();
        return view('admin.report.purchase-requisition.show', [
            'data' => $cetak_permintaan_pembelian[0],
            'permintaan_pembelian' => $permintaan_pembelian,
        ]);
    }
}
