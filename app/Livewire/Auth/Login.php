<?php

namespace App\Livewire\Auth;

use App\Models\Librarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function rules() 
    {
        return [
            'email' => ['required', 'email', 'exists:librarians,email'],
            'password' => ['required', 'min:8', 'max:16'],
        ];
    }

    public function validationAttributes() 
    {   
        return [
            'password' => 'senha',
        ];
    }

    public function updated($propertyName) 
    {
        $this->validateOnly($propertyName);
    }

    public function login() 
    {
        $validatedData = $this->validate();

        //Temp
        /*Librarian::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        return;*/

        if (Auth::attempt($validatedData)) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with([
            'message' => 'Usuario não encontrado'
        ]);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components/layouts/auth')
            ->slot('content');
    }
}
