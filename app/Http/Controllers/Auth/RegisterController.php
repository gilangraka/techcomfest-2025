<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed',
            'nomor_hp' => 'required|string',
            'instansi' => 'required|string',
            'profesi' => 'required|string'
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
