<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'email', 'regex:/@student.avans.nl$/',
        ]);

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'blendbarometer.test@gmail.com';
        $mail->Password = 'vizc cruv bgck kmou';

        $mail->addAddress($request->email);
        $mail->Subject = 'test';
        $mail->Body = 'hello';

        $mail->send();

        return redirect('/verificatie');
    }

    public function verify()
    {
        return view('verify');
    }
}
