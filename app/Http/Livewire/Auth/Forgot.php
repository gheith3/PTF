<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Forgot extends Component
{
    public array $form = ["phone" => ""];

    public function submit()
    {
        $this->validate([
           "form.phone" => "required|numeric"
        ]);

        $user = User::where("phone", $this->form['phone'])->first();
        if ($user){
            $authToken = Str::random(68);
            $user->update([
                "auth_update_token" => $authToken,
            ]);
            $this->redirect(route('auth.pin.confirm', ['token' => $authToken]));
        }else{
            $this->addError("", "check your phone number");
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot');
    }

}
