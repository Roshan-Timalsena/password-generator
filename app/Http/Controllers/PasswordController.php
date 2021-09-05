<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    function generate()
    {
        return view('password-gen', ['password' => '']);
    }

    function getNew(Request $request)
    {

        $validator = Validator::make($request->all(), ['length' => 'required|integer|min:10|max:25']);
        if($validator->fails()){
            return response()->json(['message'=>'Invalid Length', 'password'=>'']);
        }

        $generatedPassword = "";
        if (!empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#`$%^&*()_+\"-={}[]|:;><,.?');
        }

        if (!empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        }

        if (!empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        }

        if (!empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890');
        }

        if (empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyz');
        }

        if (!empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$`%^&*()_+-\"={}[]|:;><,.?');
        }

        if (!empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*()_`+-={}\"[]|:;><,.?');
        }

        if (empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('abcdefghijklmnopqrstuvwxyz~!@#$%^&*()_+`\"-={}[]|:;><,.?');
        }

        if (!empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*`\"()_+-={}[]|:;><,.?');
        }

        if (empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle('1234567890~!@#$%^&*()_+-=\"{`}[]|:;><,.?');
        }

        if (empty($request->chk1) && !empty($request->chk2) && !empty($request->chk3) && !empty($request->chk4)) {

            $baseString = str_shuffle(bin2hex(random_bytes(20)) . 'ghijklmnopqrstuvwxyz~!@#$%^&*(\")_+-`={}[]|:;><,.?');
        }

        if (empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && !empty($request->chk4)) {
            $baseString = "";
            $string = str_shuffle('~!@#$%^&*\"`()_+-={}[]|:;><,.?');
            for($i = 0 ; $i < $request->length; $i++){
                $randomIndex = random_int(0,strlen($string));
                $baseString .= $string[$randomIndex];
            }
        }

        if (empty($request->chk1) && empty($request->chk2) && !empty($request->chk3) && empty($request->chk4)) {
            $random = "123456789012345";
            $num = random_int(100000000000, 99999999999999);
            $baseString = str_shuffle($random . $num);
        }

        if (empty($request->chk1) && !empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {
            $baseString = "";
            $string = str_shuffle('abcdefghijklmnopqrstuvwxyz');
            for($i = 0 ; $i < $request->length; $i++){
                $randomIndex = random_int(0,strlen($string));
                $baseString .= $string[$randomIndex];
            }
        }

        if (!empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {

            $string = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $baseString = "";
            for($i = 0 ; $i < $request->length; $i++){
                $randomIndex = random_int(0,strlen($string));
                $baseString .= $string[$randomIndex];
            }
        }

        if (empty($request->chk1) && empty($request->chk2) && empty($request->chk3) && empty($request->chk4)) {
            return response()->json(['message' => 'Please Select At Least One Condition', 'password' => '']);
        } else {
            $generatedPassword = substr($baseString,0,$request->length);
            return response()->json(['message' => 'success', 'password' => $generatedPassword]);
        }
    }
}
