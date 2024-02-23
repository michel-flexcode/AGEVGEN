<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\TokenMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;

class TokenController extends Controller
{
    public function sendToken($studentId)
    {
        // Générer un token
        $token = Str::random(60);

        // Enregistrer le token dans la base de données
        $student = Student::find($studentId);
        $student->unique_token = $token;
        $student->save();

        // Envoyer l'e-mail avec le token
        Mail::to($student->email)->send(new TokenMail($token));

        return redirect()->back()->with('success', 'Token sent successfully');
    }
}
