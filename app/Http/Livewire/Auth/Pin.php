<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Pin extends Component
{
    public User $user;
    public array $form = ["code" => ""];
    protected $listeners = ["timerComplete"];
    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function sendPin(){
        if ($this->user->pin_expired_at == null || $this->user->pin_expired_at < now()) {
            $this->user->update([
                "pin" => $this->getNewPin(),
                "pin_expired_at" => now()->addSeconds(60 * config('PTF.pin-expired-time'))
            ]);
        }

        $this->dispatchBrowserEvent('pin:start-timer', [
            "seconds" => $this->user->pin_expired_at->diffInSeconds(now())
        ]);
    }

    public function confirmPin()
    {
        $this->validate([
            'form.code' => ['string', 'required']
        ]);

        if ($this->user != null && $this->form['code'] == $this->user->pin) {

            $this->dispatchBrowserEvent('swal:modal', [
                "text" => "success user account",
                "type" => "success",
                "title" => "success",
            ]);
            Auth::login($this->user, true);
            $this->user->update([
                "pin" => $this->getNewPin(),
                "phone_verified_at" => now(),
                "pin_expired_at" => null,
                "auth_update_token" => null,
            ]);
            return redirect()->intended('dashboard');
        }else {
            $this->dispatchBrowserEvent('swal:modal', [
                "text" => "check your pin code then try again",
                "type" => "error",
                "title" => "there is some error",
            ]);
        }
    }

    protected function getNewPin() : int {
        return rand(10001, 99999);
    }

    public function timerComplete(){

    }

    public function render()
    {
        return view('livewire.auth.pin');
    }
}
