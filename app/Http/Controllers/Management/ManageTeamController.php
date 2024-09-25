<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\RefTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        switch (true) {
            case $user->hasRole('Developer'):
                $data = RefTeam::whereNotNull('file_berkas')
                    ->whereNotNull('file_bukti_pembayaran')
                    ->get();
                break;
            case array_key_exists($user->getRoleNames()->first(), $kategoriMap):
                $kategori_id = $kategoriMap[$user->getRoleNames()->first()];
                $data = RefTeam::where('kategori_id', $kategori_id)
                    ->whereNotNull('file_berkas')
                    ->whereNotNull('file_bukti_pembayaran')
                    ->get();
                break;
            default:
                $data = collect();
                break;
        }

        return view('pages.manage-team.index', compact('data'));
    }

    // Verifikasi Tim
    public function update($id)
    {
        $team = RefTeam::find($id);
        $team->is_verified = 2;
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
        $team->is_verified = 1;
        $team->keterangan = $request->keterangan;
        $team->save;

        notyf()->success('Berhasil menolak verifikasi tim!');
        return back();
    }
}
