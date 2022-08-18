<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        $p = User::where('id', $request->post_id)->first();
        if (Hash::check($request->passwordOld,$p->password)) {
           $p->password = Hash::make($request->passwordOld);
           if ($p->save()) {
            $p->save();
            return Response::json($p);
           }
        } else {
            return Response::json($respone = ['error' => "Password lama salah!"], 422);
        }
    }
}
