<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Encrypt;
use Illuminate\support\facades\Crypt;
class encryptController extends Controller
{

    public function encryptionPage()
    {
        return view('Form.encryption-page');
    }
    public function validationPage()
    {
        return view('Form.validation-page');
    }

    //
    //

    public function md5($algorithms)
    {
        return view('Form.encryption-page',compact('algorithms'));
    }
    public function sha1($algorithms)
    {
        return view('Form.encryption-page',compact('algorithms'));
    }

    public function base64($algorithms)
    {
        return view('Form.encryption-page',compact('algorithms'));
    }

    public function bcrypt($algorithms)
    {
        return view('Form.encryption-page',compact('algorithms'));
    }

    public function Encryptions(Request $request)
    {
        $request->validate([
            'value' => 'required',
            'algorithms' => 'required'],
        [
        'algorithms.required' => 'Please select an algorithm.'
        ]);

        $text_data = $request->value;
        $algorithms = $request->algorithms;
        switch ($algorithms){
            case 'md5':
                $data = md5($text_data);
                return back()->with('data', $data);
            case 'sha1':
                $data = sha1($text_data);
                return back()->with('data', $data);
            case 'base64':
                $data = base64_encode($text_data);
                return back()->with('data', $data);
            case 'bcrypt':
                $data = bcrypt($text_data);
                return back()->with('data', $data);
            default:
                return back()->with('Fail', "Invalid Input");
        }

//
//        if ($text_data == null) {
//            $data = null;
//            return back()->with('data', $data);
//        } else {
//            $data = md5($text_data);
//            return back()->with('data', $data);
//        }
    }


//    Validation
    public function functionForMd5($algorithms)
    {
        return view('Form.validation-page',compact('algorithms'));
    }
    public function functionForSha1($algorithms)
    {
        return view('Form.validation-page',compact('algorithms'));
    }

    public function functionForBase64($algorithms)
    {
        return view('Form.validation-page',compact('algorithms'));
    }


    public function functionForBcrypt($algorithms)
    {
        return view('Form.validation-page',compact('algorithms'));
    }

    public function Validations(Request $request)
   {
       $request->validate([
           'encryptValue' => 'required',
           'strValue' => 'required',
           'algorithms' => 'required'],

           [
           'algorithms.required' => 'Please select an algorithm.'

       ]);


       $h_data = $request->encryptValue;
       $s_data = $request->strValue;
       $algorithms = $request->algorithms;

            if($request->algorithms == 'bcrypt'){
                if(password_verify($s_data, $h_data)) {
                    return back()->with('matched', 'Matched');
                }
            }
          elseif ( $h_data == $algorithms($s_data)) {
              return back()->with('matched', 'Matched');
           }

              return back()->with('do not matched', 'Not Matched');

       }




}
