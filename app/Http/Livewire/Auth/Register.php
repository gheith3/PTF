<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\Rules\Password;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class Register extends Component
{
    public User $user;
    public $form = [
        "name" => "",
        "phone" => "",
        "password" => "",
        "password_confirmation" => ""
    ];

    protected $rules = [
        'form.name' => ['required', 'string', 'max:255'],
        'form.phone' => ['required', 'numeric', 'max:255', 'unique:users'],
        'form.password' => 'required', 'string', 'confirmed'
    ];

    protected function setInitForm()
    {

    }

    public function submit()
    {
        $this->validate([
            "form.name" => ["required", "max:20", "min:3"],
            "form.phone" => ["required", "numeric", "unique:users,phone"],
            "form.password" => ["required", "min:8", "confirmed"]
        ]);
        $authToken = Str::random(68);
        $this->user = User::create([
            'name' => $this->form['name'],
            'phone' => $this->form['phone'],
            'password' => Hash::make($this->form['password']),
            "auth_update_token" => $authToken,
        ]);
        $this->setInitForm();

        $this->redirect(route('auth.pin.confirm', ['token' => $authToken]));
    }



    public function mount()
    {
        $this->setInitForm();

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
