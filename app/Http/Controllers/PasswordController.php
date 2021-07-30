<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    function generate()
    {
        return view('password', ['password' => '']);
    }

    function getNew(Request $request)
    {
        if (!empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyz');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyz~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('1234567890~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyz~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('~!@#$%^&*()_+-={}[]|:;><,.?');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = random_int(100000000000, 99999999999999);
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyz');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (!empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $generatedPassword = substr(($baseString), 0, 12);
            return response()->json(['message'=>'success', 'password'=>$generatedPassword]);
        }

        if (empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {
            return response()->json(['message'=>'Please Select At Least One Condition', 'password'=>'']);
        }
    }
}
