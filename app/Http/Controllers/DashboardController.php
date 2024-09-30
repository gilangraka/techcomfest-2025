<?php

namespace App\Http\Controllers;

use App\Models\RefGender;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    private function generate_nama_file()
    {
        $nama_file = Str::random(20);
        $exists = RefPeserta::where('foto_profil', 'like', $nama_file . '%')->exists();
        if ($exists) {
            return $this->generate_nama_file();
        }
        return $nama_file;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('ref_peserta.ref_kategori')->find(Auth::id());
        $role = User::find(Auth::id())->getRoleNames();
        $referensi = [
            'ref_gender' => RefGender::all()
        ];

        return view('pages.dashboard.index', compact('data', 'role', 'referensi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nomor_hp' => 'required|string|max:20',
            'gender_id' => 'required|exists:ref_gender,id',
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
            $user->update($validatedData);
            $user->ref_peserta->update($validatedData);
            DB::commit();
            notyf()->success('Berhasil menyimpan data!');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto_profil' => 'required|file|mimes:jpeg,png,jpg|max:1024'
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

            $file = $request->file('foto_profil');
            $nama_file = $this->generate_nama_file() . '.' . $file->getClientOriginalExtension();
            $path_file = 'foto_profil/' . $nama_file;
            $user->ref_peserta->foto_profil = $nama_file;
            $user->ref_peserta->save();

            Storage::disk('public')->put($path_file, file_get_contents($file));
            DB::commit();
            notyf()->success('Berhasil mengupload foto profil');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function delete_profile()
    {
        $user = Auth::user();
        $nama_file = RefPeserta::where('user_id', $user->id)->pluck('foto_profil')[0];
        $path_file = 'foto_profil/' . $nama_file;

        Storage::disk('public')->delete($path_file);
        $user->ref_peserta->foto_profil = null;
        $user->ref_peserta->save();

        notyf()->success("Berhasil menghapus foto profil!");
        return back();
    }
}
