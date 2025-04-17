<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check())
        {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function submitLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'ends_with:@student.avans.nl'],
        ]);

        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $hash = password_hash($code, PASSWORD_DEFAULT);
        Session::put('verification_code', $hash);
        Session::put('expires_at', now()->addMinutes(10));

        Session::put('email', $request->email);

        $lastSent = Session::get('last_sent');
        if ($lastSent && Carbon::parse($lastSent)->diffInSeconds(now()) < 60)
        {
            return back()->withErrors(['cooldown' => 'Wacht even voordat je opnieuw een code aanvraagt.'])->withInput();
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'blendbarometer.test@gmail.com';
        $mail->Password = 'vizc cruv bgck kmou';

        $html = View::make('verification-email', ['code' => $code])->render();

        $mail->addAddress($request->email);
        $mail->isHTML(true);
        $mail->Subject = 'Verificatiecode';

        $mail->AddEmbeddedImage(public_path('images/logo.png'), 'logoCID', 'logo.png');

        $mail->Body = $html;
        $mail->send();        

        Session::put('last_sent', now());

        return redirect()->route('verify');
    }

    public function verify()
    {
        if (!Session::get('email'))
        {
            return redirect()->route('login');
        }
        else if (Auth::check())
        {
            return redirect()->route('home');
        }
        return view('verify');
    }

    public function submitVerify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'digits:6'],
            'email' => ['required', 'email', 'ends_with:@student.avans.nl'],
        ]);

        $original = Session::get('verification_code');
        $given = $request->code;

        if (Session::get('expires_at') < now())
        {
            return back()->withErrors(['expired' => 'Deze verificatiecode is verlopen.']);
        }

        if (password_verify($given, $original))
        {
            $user = User::where('email', $request->email)->first();
            if (!$user)
            {
                $user = User::create([
                    'email' => $request->email,
                    'email_verified_at' => Carbon::now(),
                ]);
            }
            Auth::login($user);
            return redirect()->route('information');
        }
        else
        {
            return back()->withErrors(['code' => 'De opgegeven code komt niet overeen.']);
        }
    }
}
