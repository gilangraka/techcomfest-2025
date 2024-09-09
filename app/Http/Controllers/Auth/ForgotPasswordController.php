<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        try {
            $default_password = "semnastechcompfest2025";
            $user = User::findOrFail($id);
            $user->password = bcrypt($default_password);
            $user->save();

            notyf()->success('Berhasil reset password');
        } catch (\Exception $e) {
            notyf()->error($e->getMessage());
        }
        return back();
    }
}
