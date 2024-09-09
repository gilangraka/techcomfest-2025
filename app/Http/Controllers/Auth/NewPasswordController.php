<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NewPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            foreach ($errors as $error) {
                notyf()->error($error);
            }
            return back();
        }

        try {
            $user = User::findOrFail(Auth::id());
            if (!Hash::check($request->current_password, $user->password)) {
                notyf()->error('Password yang kamu masukkan salah');
                return back();
            }
            $user->password = bcrypt($request->new_password);
            notyf()->success('Berhasil mengganti password');
        } catch (\Exception $e) {
            notyf()->error($e->getMessage());
        }

        return back();
    }
}
