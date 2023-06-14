<?php

namespace App\Http\Controllers;

use App\Mail\ActiveYourAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActiveController extends Controller
{
    public function activeAccount($code){
        $user = User::whereCode($code)->first();
        $user->code = null;
        $user->update([
            'active' => 1
        ]);
        Auth::login($user);

        return redirect('/home')->with('success', 'Vous avez connecté avec succé !!');
        
    } 

    public function resendCode($email){
        $user = User::whereEmail($email)->first();
        if($user->active){
            redirect('/home');
        }
        Mail::to($user)->send(new ActiveYourAccount($user->code));

        return redirect('/login')->with("success","Le lien d'activation est envoyé !!");
    }
}
