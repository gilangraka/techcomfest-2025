<?php

namespace App\Http\Controllers;

use App\Models\RefTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BerkasController extends Controller
{
    private function generate_nama_file($kode)
    {
        // kode 1 (generate berkas), 2 (generate bukti pembayaran)
        if ($kode == 1) {
            $table = 'file_berkas';
        } else if ($kode == 2) {
            $table = 'file_bukti_pembayaran';
        } else {
            return 0;
        }

        $nama_file = Str::random(20);
        $exists = RefTeam::where($table, 'like', $nama_file . '%')->exists();
        if ($exists) {
            return $this->generate_nama_file($kode);
        }
        return $nama_file;
    }

    public function uploadBerkas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_berkas' => 'required|file|mimes:zip,rar'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        try {
            $user = Auth::user();
            DB::beginTransaction();

            $file = $request->file('file_berkas');
            $nama_file = $this->generate_nama_file(1) . '.' . $file->getClientOriginalExtension();
            $path_file = 'file_berkas/' . $nama_file;
            $user->ref_peserta->ref_team->file_berkas = $nama_file;
            $user->ref_peserta->ref_team->save();

            Storage::disk('public')->put($path_file, file_get_contents($file));
            DB::commit();
            notyf()->success('Berhasil mengupload file');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function lihatBerkas($berkas)
    {
        $filePath = 'file_berkas/' . $berkas;
        if (!Storage::disk('public')->exists($filePath)) {
            return abort(404, 'File not found');
        }

        return response()->download(storage_path('app/public/' . $filePath));
    }

    public function deleteBerkas()
    {
        $user = Auth::user();
        $nama_file = $user->ref_peserta->ref_team->file_berkas;
        $path_file = 'file_berkas/' . $nama_file;

        Storage::disk('public')->delete($path_file);
        $user->ref_peserta->ref_team->file_berkas = null;
        $user->ref_peserta->ref_team->save();

        notyf()->success("Berhasil menghapus file!");
        return back();
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        try {
            $user = Auth::user();
            DB::beginTransaction();

            $file = $request->file('file_bukti_pembayaran');
            $nama_file = $this->generate_nama_file(1) . '.' . $file->getClientOriginalExtension();
            $path_file = 'file_bukti_pembayaran/' . $nama_file;
            $user->ref_peserta->ref_team->file_bukti_pembayaran = $nama_file;
            $user->ref_peserta->ref_team->save();

            Storage::disk('public')->put($path_file, file_get_contents($file));
            DB::commit();
            notyf()->success('Berhasil mengupload file');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function lihatBuktiPembayaran($bukti_pembayaran)
    {
        $filePath = 'file_bukti_pembayaran/' . $bukti_pembayaran;
        if (!Storage::disk('public')->exists($filePath)) {
            return abort(404, 'File not found');
        }

        return response()->download(storage_path('app/public/' . $filePath));
    }

    public function deleteBuktiPembayaran()
    {
        $user = Auth::user();
        $nama_file = $user->ref_peserta->ref_team->file_bukti_pembayaran;
        $path_file = 'file_bukti_pembayaran/' . $nama_file;

        Storage::disk('public')->delete($path_file);
        $user->ref_peserta->ref_team->file_bukti_pembayaran = null;
        $user->ref_peserta->ref_team->save();

        notyf()->success("Berhasil menghapus file!");
        return back();
    }
}
