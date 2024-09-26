<?php

namespace App\Http\Controllers;

use App\Models\RefMulmed;
use App\Models\RefNetwork;
use App\Models\RefSoftware;
use Illuminate\Http\Request;

class HasilKaryaController extends Controller
{
    public function software()
    {
        $data = RefSoftware::with('ref_team')->get();
        return view('pages.hasil-karya.software', compact('data'));
    }

    public function multimedia()
    {
        $data = RefMulmed::with('ref_team')->get();
        return view('pages.hasil-karya.mulmed', compact('data'));
    }

    public function network()
    {
        $data = RefNetwork::with('ref_team')->get();
        return view('pages.hasil-karya.network', compact('data'));
    }
}
