<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LihatBerkasController extends Controller
{
    public function downloadBerkas($kode, $berkas)
    {
        // 1 = file_berkas, 2 = file_bukti_pembayaran, 3 = file_rar, 4 = orisinalitas_karya, 5 = hasil_karya
        $paths = [
            1   => 'file_berkas/',
            2   => 'file_bukti_pembayaran/',
            3   => 'network/',
            4   => 'mulmed/orisinalitas_karya/',
            5   => 'mulmed/hasil_karya/'
        ];
        if (array_key_exists($kode, $paths)) {
            $filePath = $paths[$kode] . $berkas;
            if (!Storage::disk('public')->exists($filePath)) {
                return abort(404, 'File not found');
            }
            return response()->download(storage_path('app/public/' . $filePath));
        }

        notyf()->error('Kode salah!');
        return back();
    }
}
