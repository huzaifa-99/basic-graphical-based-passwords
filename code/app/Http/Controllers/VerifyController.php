<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class VerifyController extends Controller
{
    public function verifyAccount(Request $request)
    {	

    	$user = User::where('email', '=', $request->email)->first();
		if ($user === null) {
		   return redirect('/login')->withErrors([
		   		'email' => 'Invalid Email Address'
		   ]);
		}
    	// $is_existant = User
        // dd($request->email);
        // return get('/login',[
        // 	'email',$request->email
        // ]);

        if($user->color=='Black'){ $user->colorDeg = 0 ; }
        if($user->color=='Blue'){ $user->colorDeg = 45 ; }
        if($user->color=='White'){ $user->colorDeg = 90 ; }
        if($user->color=='Brown'){ $user->colorDeg = 135 ; }
        if($user->color=='Purple'){ $user->colorDeg = 180 ; }
        if($user->color=='Green'){ $user->colorDeg = 225 ; }
        if($user->color=='Yellow'){ $user->colorDeg = 270 ; }
        if($user->color=='Red'){ $user->colorDeg = 315 ; }

        // dd($user->colorDeg);

    	return redirect('/login')
    		->with('email',$request->email)->with('color',$user->colorDeg);	
        // ->back()->with(
            
        // );
    }
}
