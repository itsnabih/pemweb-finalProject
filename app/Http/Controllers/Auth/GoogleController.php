<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('google_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('produk.index');
            } else {
                $findUserByEmail = User::where('email', $user->email)->first();
                
                if ($findUserByEmail) {
                    $findUserByEmail->update([
                        'google_id' => $user->id
                    ]);
                    Auth::login($findUserByEmail);
                    return redirect()->route('produk.index');
                } else {
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => bcrypt('123456dummy')
                    ]);

                    Auth::login($newUser);
                    return redirect()->route('produk.index');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
