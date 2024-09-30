<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ManageIndependentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('roles')->whereHas('roles', function ($query) {
            $query->whereIn('name', ['independenS', 'independenM', 'independenN']);
        })->get();

        $ref_roles = DB::table('roles')
            ->whereIn('name', ['independenS', 'independenM', 'independenN'])
            ->get();

        return view('pages.manage-independent.index', compact('data', 'ref_roles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $user = User::with(['ref_peserta.ref_kategori', 'roles'])->where('email', $email)->first();
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'jenis_independen' => 'required|exists:roles,id'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        $role = DB::table('roles')->find($request->jenis_independen);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            notyf()->error('Data tidak ditemukan. Periksa inputan email kamu!');
            return back();
        }
        $user->assignRole($role->name);

        notyf()->success('Berhasil menambah independen!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $user = User::where('email', $email)->first();
        $user->removeRole('IndependenM');
        $user->removeRole('IndependenS');
        $user->removeRole('IndependenN');

        notyf()->success('Berhasil menghapus independen!');
        return back();
    }
}
