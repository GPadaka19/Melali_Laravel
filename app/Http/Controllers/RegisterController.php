<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{

    public function register()
    {
        return view('account.register');
    }
    
    public function actionregister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols(),
            ],
        ], [
            'password.min' => 'The password must be at least 8 characters long.',
            'password.mixedCase' => 'The password must contain at least one uppercase and one lowercase letter.',
            'password.letters' => 'The password must contain at least one letter.',
            'password.numbers' => 'The password must contain at least one number.',
            'password.symbols' => 'The password must contain at least one special character.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        $str = Str::random(100);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => "user",
            'verify_key' => $str
        ]);

        $datetime = Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');

        $details = [
            'username' => $request->username,
            'role' => "user",
            'website' => 'www.melali.com',
            'datetime' => $datetime,
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];

        Mail::to($request->email)->send(new MailSend($details));

        Session::flash('message', 'Link verifikasi telah dikirim ke Email Anda. Silahkan cek Email Anda untuk Mengaktifkan Akun');
        return redirect('register');
    }

    public function verify($verify_key)
    {
        $keyCheck = User::where('verify_key', $verify_key)->exists();

        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)->first();
            $user->active = 1;
            $user->save();

            // Redirect to login after 5 seconds
            $script = '<script>';
            $script .= 'setTimeout(function() { window.location.href = "'.route('login').'"; }, 5000);';
            $script .= '</script>';

            // Check if user is active and set email_verified_at if so
            if ($user->active == 1) {
                $user->email_verified_at = now();
                $user->save();
            }

            return "Verifikasi telah berhasil. Akun Anda kini aktif. Dalam waktu 5 detik, Anda akan dialihkan ke halaman login." . $script;
        } else {
            return "Kunci tidak valid!";
        }
    }

    protected function registered(Request $request, $user)
    {
        // Check if user is active and set email_verified_at if so
        if ($user->active == 1) {
            $user->email_verified_at = now();
            $user->save();
        }

        return redirect($this->redirectPath());
    }
}
