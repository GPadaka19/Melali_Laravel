<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function register()
    {
        return view('account.register');
    }
    
    public function actionregister(Request $request)
    {
        // \Log::info('Start actionregister');
    
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            // 'password' => 'required|confirmed|min:8',
            'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->mixedCase() // Memastikan ada huruf besar dan huruf kecil
                ->letters() // Memastikan ada huruf
                ->numbers() // Memastikan ada angka
                ->symbols(), // Memastikan ada simbol
        ],
    ], [
        'password.min' => 'The password must be at least 8 characters long.',
        'password.mixedCase' => 'The password must contain at least one uppercase and one lowercase letter.',
        'password.letters' => 'The password must contain at least one letter.',
        'password.numbers' => 'The password must contain at least one number.',
        'password.symbols' => 'The password must contain at least one special character.',
        'password.confirmed' => 'The password confirmation does not match.',
    ]);

        // \Log::info('Validation passed');
    
        $str = Str::random(100);
    
        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => "user",
            'verify_key' => $str
        ]);
        // \Log::info('User created', ['user_id' => $user->id]);

        // Set timezone to UTC+7
        $datetime = Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');
    
        $details = [
            'username' => $request->username,
            'role' => "user",
            'website' => 'www.melali.com',
            'datetime' => $datetime,
            'url' => request()->getHttpHost().'/register/verify/'.$str
        ];
    
        Mail::to($request->email)->send(new MailSend($details));
    
        // \Log::info('Verification email sent');
        
        Session::flash('message', 'Link verifikasi telah dikirim ke Email Anda. Silahkan Cek Email Anda untuk Mengaktifkan Akun');
        return redirect('register');
    }
    
    public function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')
                    ->where('verify_key', $verify_key)
                    ->exists();
        
        if ($keyCheck) {
            $user = User::where('verify_key', $verify_key)
            ->update([
                'active' => 1
            ]);
            
            return "Verifikasi Berhasil. Akun Anda sudah aktif.";
        } else {
            return "Key tidak valid!";
        }
    }
}