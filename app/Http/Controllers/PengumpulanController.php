<?php

namespace App\Http\Controllers;

use App\Models\RefMulmed;
use App\Models\RefNetwork;
use App\Models\RefSoftware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PengumpulanController extends Controller
{
    private function generate_nama_file($kode)
    {
        // Kode 1 = network, 2 = mulmed (orisinalitas), 3 = mulmed (hasil)
        $nama_file = Str::random(20);
        if ($kode == 1) {
            $exists = RefNetwork::where('file_rar', 'like', $nama_file . '%')->exists();
        }
        if ($kode == 2) {
            $exists = RefMulmed::where('orisinalitas_karya', 'like', $nama_file . '%')->exists();
        }
        if ($kode == 3) {
            $exists = RefMulmed::where('hasil_karya', 'like', $nama_file . '%')->exists();
        }

        if ($exists) {
            return $this->generate_nama_file($kode);
        }
        return $nama_file;
    }

    public function store(Request $request)
    {
        $user = Auth::user()->load('ref_peserta.ref_team');
        $kategori_id = $user->ref_peserta->ref_team->kategori_id;
        $team_id = $user->ref_peserta->team_id;

        try {
            $validators = [
                1 => [
                    'rules' => [
                        'link_host' => 'required|string',
                        'link_git' => 'required|string',
                    ],
                    'model' => RefSoftware::class,
                ],
                2 => [
                    'rules' => [
                        'file_rar' => 'required|file|mimes:zip,rar',
                    ],
                    'model' => RefNetwork::class,
                ],
                3 => [
                    'rules' => [
                        'orisinalitas_karya' => 'required|file|mimes:pdf,docx',
                        'hasil_karya' => 'required|file|mimes:pdf,docx',
                    ],
                    'model' => RefMulmed::class,
                ],
            ];

            if (array_key_exists($kategori_id, $validators)) {
                $validator = Validator::make($request->all(), $validators[$kategori_id]['rules']);

                if ($validator->fails()) {
                    foreach ($validator->errors()->all() as $error) {
                        notyf()->error($error);
                    }
                    return back();
                }

                $validatedData = $validator->validated();
                $validatedData['team_id'] = $team_id;

                if ($kategori_id == 1) {
                    $data = new RefSoftware();
                    $data->team_id = $team_id;
                    $data->link_host = $validatedData['link_host'];
                    $data->link_git = $validatedData['link_git'];
                    $data->save();
                }

                if ($kategori_id == 2) {
                    $data = new RefNetwork();
                    $data->team_id = $team_id;

                    $file = $request->file('file_rar');
                    $nama_file = $this->generate_nama_file(1) . '.' . $file->getClientOriginalExtension();
                    $path_file = 'network/' . $nama_file;
                    Storage::disk('public')->put($path_file, file_get_contents($file));

                    $data->file_rar = $nama_file;
                    $data->save();
                }

                if ($kategori_id == 3) {
                    $data = new RefMulmed();
                    $data->team_id = $team_id;

                    $file_orisinalitas = $request->file('orisinalitas_karya');
                    $nama_file_orisinalitas = $this->generate_nama_file(2) . '.' . $file_orisinalitas->getClientOriginalExtension();
                    $path_orisinalitas = 'mulmed/orisinalitas_karya/' . $nama_file_orisinalitas;
                    Storage::disk('public')->put($path_orisinalitas, file_get_contents($file_orisinalitas));

                    $file_hasil = $request->file('hasil_karya');
                    $nama_file_hasil = $this->generate_nama_file(3) . '.' . $file_hasil->getClientOriginalExtension();
                    $path_hasil = 'mulmed/hasil_karya/' . $nama_file_hasil;
                    Storage::disk('public')->put($path_hasil, file_get_contents($file_hasil));

                    $data->orisinalitas_karya = $nama_file_orisinalitas;
                    $data->hasil_karya = $nama_file_hasil;
                    $data->save();
                }

                notyf()->success('Berhasil mengumpulkan karya');
                return back();
            }
            notyf()->error('Kategori tidak valid');
            return back();
        } catch (\Exception $e) {
            notyf()->error($e->getMessage());
            return back();
        }
    }
}
