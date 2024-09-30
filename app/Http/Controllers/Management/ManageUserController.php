<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('ref_peserta.ref_gender')->with('ref_peserta.ref_kategori')->get();

        return view('pages.manage-user.index', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('ref_peserta.ref_gender')->with('ref_peserta.ref_kategori')->with('ref_peserta.ref_team')->find($id);
        return response()->json($user);
    }
}
