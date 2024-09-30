<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\RefTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManageTeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategoriMap = [
            'IndependenS' => 1,
            'IndependenN' => 2,
            'IndependenM' => 3,
        ];

        $data = collect();
        if ($user->hasRole('Developer')) {
            $developerData = RefTeam::with(['ref_kategori', 'ref_peserta.user'])->whereNotNull('file_berkas')
                ->whereNotNull('file_bukti_pembayaran')
                ->get();
            $data = $data->merge($developerData);
        }

        foreach ($kategoriMap as $key => $value) {
            if ($user->hasRole($key)) {
                $kategoriData = RefTeam::with(['ref_kategori', 'ref_peserta.user'])->where('kategori_id', $value)
                    ->whereNotNull('file_berkas')
                    ->whereNotNull('file_bukti_pembayaran')
                    ->get();
                $data = $data->merge($kategoriData);
            }
        }
        // return $data;
        return view('pages.manage-team.index', compact('data'));
    }

    public function show($id)
    {
        $data = RefTeam::with(['ref_kategori', 'ref_peserta.user'])->find($id);
        return response()->json($data);
    }

    // Verifikasi Tim
    public function update($id)
    {
        $team = RefTeam::find($id);
        $team->is_verified = 1;
        $team->keterangan = null;
        $team->save();

        notyf()->success('Berhasil verifikasi tim!');
        return back();
    }

    // Tolak Verifikasi Tim
    public function destroy($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => 'required|string'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }



        $team = RefTeam::find($id);
        $path_berkas = 'file_berkas/' . $team->file_berkas;
        $path_pembayaran = 'file_bukti_pembayaran/' . $team->file_bukti_pembayaran;
        Storage::disk('public')->delete($path_berkas);
        Storage::disk('public')->delete($path_pembayaran);
        $team->file_berkas = null;
        $team->file_bukti_pembayaran = null;
        $team->is_verified = 0;
        $team->keterangan = $request->keterangan;
        $team->save();

        notyf()->success('Berhasil menolak verifikasi tim!');
        return back();
    }
}
