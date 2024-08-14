<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgottenPasswordRequest;
use App\Http\Requests\OtpCodeRequest;
use App\Interfaces\AuthenticationInterface;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegistrationRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;
    public function __construct(AuthenticationInterface $authInterface) { 
        $this->authInterface = $authInterface;
    }

    public function login(LoginRequest $request) {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            if ($this->authInterface->login($data)) {
                return redirect()->route('dashboard');
            }else {
                return back()->with('error', 'Email ou mot de passe incorrect(s).');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request) {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            
            $user = $this->authInterface->registration($data);

            Auth::login($user);

            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }


    public function forgottenPassword(ForgottenPasswordRequest $request) {

        $data = [
            'email' => $request->email,
        ];

        try {
            if ($this->authInterface->forgottenPassword($data['email'])) {
                return redirect()->route('otpCode');
            }else {
                return back()->with('error', 'Email non trouvé');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    

    public function checkOtpCode(OtpCodeRequest $request) {

        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        try {

            $code = $this->authInterface->checkOtpCode($data);

            if (!$code) {
                return back()->with('error', 'Code de confirmation invalide');
            }else {
                return redirect()->route('newPassword');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }


    public function newPassword(OtpCodeRequest $request) {

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'passwordConfirm' => $request->passwordConfirm,
            'code' => $request->code,
        ];

        try {

            $user = $this->authInterface->newPassword($data);

            if (!$user) {
                return back()->with('error', 'Impossible de faire la mise à jour, Reprendre');
            }else {
                return redirect()->route('dashboard');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }



}
