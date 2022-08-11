<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class DownloadController extends Controller
{
    public function download($uuid)
    {
        $tiket = Tiket::where('file_lama', $uuid)->firstOrFail();
        $pathToFile = storage_path('../public/file/' . $tiket->file_lama);
        return response()->download($pathToFile);
    }
    public function downloadBaru($uuid)
    {
        $tiket = Tiket::where('file_baru', $uuid)->firstOrFail();
        $pathToFile = storage_path('../public/file/' . $tiket->file_baru);
        return response()->download($pathToFile);
    }
}
