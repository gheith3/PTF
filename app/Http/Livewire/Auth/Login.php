<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        "phone" => "",
        "password" => "",
        "remember" => false
    ];

    public function submit()
    {
        $this->validate([
            "form.phone" => ["required", "numeric"],
            "form.password" => ["required", "min:8"],
            "form.remember" => ["required", "boolean"]
        ]);
        $credentials = [
            'phone' => $this->form['phone'],
            'password' => $this->form['password'],
        ];
        $user = User::where("phone", $this->form['phone'])->first();

        if ($user) {
            if ($user->phone_verified_at == null) {
                $authToken = Str::random(68);
                $user->update([
                    "auth_update_token" => $authToken,
                ]);
                $this->redirect(route('auth.pin.confirm', ['token' => $authToken]));
            } else {
                Auth::attempt($credentials, $this->form['remember']);
                return redirect()->intended('dashboard');
            }
        } else {
            $this->addError('key', 'check your info then try again');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
