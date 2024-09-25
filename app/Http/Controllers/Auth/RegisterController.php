<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RefGender;
use App\Models\RefKategori;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $referensi = [
            'ref_gender' => RefGender::all(),
            'ref_kategori' => RefKategori::all()
        ];
        return view('pages.auth.register', compact('referensi'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed',
            'nik' => 'required|string',
            'tgl_lahir' => 'required|date',
            'nomor_hp' => 'required|string|max:20',
            'gender_id' => 'required|exists:ref_gender,id',
            'kategori_id' => 'required|exists:ref_kategori,id',
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
        $validatedData['password'] = bcrypt($validatedData['password']);

        try {
            DB::beginTransaction();

            $user = User::create($validatedData);
            $user->assignRole('Peserta');
            $validatedData['user_id'] = $user->id;
            RefPeserta::create($validatedData);

            DB::commit();
            notyf()->success('Berhasil registrasi!');
            return redirect()->route('login');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }
}
