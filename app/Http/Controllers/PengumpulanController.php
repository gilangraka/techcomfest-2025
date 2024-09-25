<?php

namespace App\Http\Controllers;

use App\Models\RefMulmed;
use App\Models\RefNetwork;
use App\Models\RefSoftware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PengumpulanController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user()->load('ref_peserta');
        $kategori_id = $user->ref_peserta->kategori_id;
        $team_id = $user->ref_peserta->team_id;

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
            $validators[$kategori_id]['model']::create($validatedData);

            notyf()->success('Berhasil mengumpulkan karya');
            return back();
        }

        // Jika tidak ada kategori yang cocok
        return back()->withErrors(['error' => 'Kategori tidak valid.']);
    }
}
