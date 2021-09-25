<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Validations\ReadmeFormValidation;
use stdClass;

class ReadmeTerminal extends Controller
{

    public function __construct()
    {
        
    }
    
    public function create(Request $request)
    {   
        $isValidForm = ReadmeFormValidation::formValidate($request->all());
        
        if (!empty($isValidForm)) {
            return redirect('/')->with('errors', $isValidForm);
        }

        $user = new stdClass();
        $user->username = htmlspecialchars($request->input('username'));
        $user->about = htmlspecialchars($request->input('about'));
        $user->bgcolor = htmlspecialchars($request->input('bgcolor'));

        return view('terminal', compact('user', $user));
    }
}
