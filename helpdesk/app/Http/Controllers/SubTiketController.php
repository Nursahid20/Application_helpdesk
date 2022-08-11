<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubTiket;

class SubTiketController extends Controller
{
    public function kategori()
    {
        return view('admin.sub_tiket.kategori', [
            'kategori' => SubTiket::where('kategori', '!=', '')->orderBy('kategori', 'asc')->get()
        ]);
    }

    public function lampiran()
    {
        return view('admin.sub_tiket.lampiran', [
            'lampiran' => SubTiket::where('lampiran', '!=', '')->orderBy('lampiran', 'asc')->get()
        ]);
    }

    public function status()
    {
        return view('admin.sub_tiket.status', [
            'status' => SubTiket::where('status', '!=', '')->orderBy('status', 'asc')->get()
        ]);
    }

    public function prioritas()
    {
        return view('admin.sub_tiket.prioritas', [
            'prioritas' => SubTiket::where('prioritas', '!=', '')->orderBy('prioritas', 'asc')->get()
        ]);
    }

    public function storeKategori(Request $request)
    {
        $data = SubTiket::where('kategori', '')->get();
        if (isset($data[0])) {
            SubTiket::where('id', $data[0]->id)
                ->update(['kategori' => $request->nama]);
        } else {
            SubTiket::create([
                'kategori' => $request->nama,
                'lampiran' => '',
                'status' => '',
                'prioritas' => ''
            ]);
        }
        return redirect('/admin/kategori')->with('success', 'Kategori Baru Berhasil ditambahkan!');
    }

    public function storeStatus(Request $request)
    {
        $data = SubTiket::where('status', '')->get();
        if (isset($data[0])) {
            SubTiket::where('id', $data[0]->id)
                ->update(['status' => $request->nama]);
        } else {
            SubTiket::create([
                'status' => $request->nama,
                'lampiran' => '',
                'status' => '',
                'prioritas' => ''
            ]);
        }
        return redirect('/admin/status')->with('success', 'Status Baru Berhasil ditambahkan!');
    }

    public function storePrioritas(Request $request)
    {
        $data = SubTiket::where('prioritas', '')->get();
        if (isset($data[0])) {
            SubTiket::where('id', $data[0]->id)
                ->update(['prioritas' => $request->nama]);
        } else {
            SubTiket::create([
                'prioritas' => $request->nama,
                'lampiran' => '',
                'status' => '',
                'prioritas' => ''
            ]);
        }
        return redirect('/admin/prioritas')->with('success', 'Prioritas Baru Berhasil ditambahkan!');
    }

    public function storeLampiran(Request $request)
    {
        $data = SubTiket::where('lampiran', '')->get();
        if (isset($data[0])) {
            SubTiket::where('id', $data[0]->id)
                ->update(['lampiran' => $request->nama]);
        } else {
            SubTiket::create([
                'kategori' => '',
                'lampiran' => $request->nama,
                'status' => '',
                'prioritas' => ''
            ]);
        }
        return redirect('/admin/lampiran')->with('success', 'Lampiran Baru Berhasil ditambahkan!');
    }

    public function updateKategori(Request $request)
    {
        SubTiket::where('id', $request->id_kategori)
            ->update(['kategori' => $request->nama]);

        return redirect('/admin/kategori')->with('success', 'Kategori Berhasil diubah!');
    }

    public function updateLampiran(Request $request)
    {
        SubTiket::where('id', $request->id_lampiran)
            ->update(['lampiran' => $request->nama]);

        return redirect('/admin/lampiran')->with('success', 'Lampiran Berhasil diubah!');
    }

    public function updateStatus(Request $request)
    {
        SubTiket::where('id', $request->id_status)
            ->update(['status' => $request->nama]);

        return redirect('/admin/status')->with('success', 'Status Berhasil diubah!');
    }

    public function updatePrioritas(Request $request)
    {
        SubTiket::where('id', $request->id_prioritas)
            ->update(['prioritas' => $request->nama]);

        return redirect('/admin/prioritas')->with('success', 'Prioritas Berhasil diubah!');
    }

    public function destroyKategori($id)
    {
        SubTiket::where('id', $id)->update(['kategori' => '']);
        return redirect('/admin/kategori')->with('success', 'Kategori Berhasil dihapus!');
    }

    public function destroyLampiran($id)
    {
        SubTiket::where('id', $id)->update(['lampiran' => '']);
        return redirect('/admin/lampiran')->with('success', 'Lampiran Berhasil dihapus!');
    }

    public function destroyStatus($id)
    {
        SubTiket::where('id', $id)->update(['status' => '']);
        return redirect('/admin/status')->with('success', 'Status Berhasil dihapus!');
    }

    public function destroyPrioritas($id)
    {
        SubTiket::where('id', $id)->update(['prioritas' => '']);
        return redirect('/admin/prioritas')->with('success', 'Prioritas Berhasil dihapus!');
    }
}
