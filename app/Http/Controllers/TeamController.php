<?php

namespace App\Http\Controllers;

use App\Models\RefMulmed;
use App\Models\RefNetwork;
use App\Models\RefPeserta;
use App\Models\RefSoftware;
use App\Models\RefTeam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $user = User::with('ref_peserta.ref_team')->find(Auth::id());
        $requiredFields = [
            $user->name,
            $user->ref_peserta->tgl_lahir,
            $user->ref_peserta->nomor_hp,
            $user->ref_peserta->gender_id,
            $user->ref_peserta->kategori_id,
        ];
        if (collect($requiredFields)->contains(null)) {
            notyf()->error("Lengkapi data terlebih dahulu!");
            return back();
        }

        $data = [];
        $data['user'] = User::with('ref_peserta.ref_team')->find(Auth::id());
        $data['team'] = optional($data['user']->ref_peserta)->team_id
            ? RefTeam::with('ref_kategori')->find($data['user']->ref_peserta->team_id)
            : null;
        if ($data['team'] != null) {
            $tim = RefPeserta::with('user')->where('team_id', $data['team']->id)->get();

            $data['ketua'] = $tim->firstWhere('is_ketua', 1);
            $data['anggota'] = $tim->where('is_ketua', 0);

            $data['pengumpulan'] = null;
            $kategori_id = $user->ref_peserta->ref_team->kategori_id;
            if ($kategori_id == 1) {
                $pengumpulan = RefSoftware::where('team_id', $data['team']->id)->first();
                if ($pengumpulan) {
                    $data['pengumpulan'] = $pengumpulan;
                }
            }
            if ($kategori_id == 2) {
                $pengumpulan = RefNetwork::where('team_id', $data['team']->id)->first();
                if ($pengumpulan) {
                    $data['pengumpulan'] = $pengumpulan;
                }
            }
            if ($kategori_id == 3) {
                $pengumpulan = RefMulmed::where('team_id', $data['team']->id)->first();
                if ($pengumpulan) {
                    $data['pengumpulan'] = $pengumpulan;
                }
            }
        }

        return view('pages.team.index', compact('data'));
    }

    public function show($nama_team)
    {
        $team = RefTeam::where('nama_team', $nama_team)->count();
        return $team;
    }

    public function buatTeam(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_team' => 'required|string',
            'asal_sekolah' => 'required|string',
            'nama_pembina' => 'required|string'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }
        $validatedData = $validator->validated();

        try {
            DB::beginTransaction();
            $user = Auth::user();

            $kategori = $user->ref_peserta->kategori_id;
            $ref_team = new RefTeam([
                'nama_team' => $validatedData['nama_team'],
                'asal_sekolah' => $validatedData['asal_sekolah'],
                'nama_pembina' => $validatedData['nama_pembina'],
                'kategori_id' => $kategori
            ]);
            $ref_team->save();

            $user->ref_peserta->update([
                'team_id' => $ref_team->id,
                'is_ketua' => 1
            ]);
            DB::commit();
            notyf()->success('Berhasil membuat team!');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function masukTeam(Request $request)
    {
        $id_team = $request->id_team;
        $user = User::with('ref_peserta')->find(Auth::id());
        $team = RefTeam::find($id_team);

        if ($user->ref_peserta->kategori_id == $team->kategori_id) {
            $count_anggota = RefPeserta::where('team_id', $team->id)->count();
            if ($count_anggota < 3) {
                $user->ref_peserta->team_id = $id_team;
                $user->ref_peserta->save();
                notyf()->success('Berhasil bergabung ke team!');
                return back();
            }
        }
        notyf()->error('Tidak bisa bergabung ke team!');
        return redirect('dashboard');
    }

    public function cariTeam(Request $request)
    {
        $data = null;
        $id_team = $request->id_team;
        $team = RefTeam::find($id_team);
        $user = User::with('ref_peserta')->find(Auth::id());

        if ($team) {
            if ($team->kategori_id == $user->ref_peserta->kategori_id) {
                $count_anggota = RefPeserta::where('team_id', $team->id)->count();
                $data = [
                    'id' => $team->id,
                    'nama' => $team->nama_team,
                    'count' => $count_anggota,
                    'available' => $count_anggota < 3 ? true : false
                ];
            }
        }
        return response()->json($data);
    }
}
