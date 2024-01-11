<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;

    public function login(){
        if(Auth::attempt([
            'name'=>$this->username,
            'password'=>$this->password,
        ])){
            return redirect()->route('dashboard');
        }else{
            session()->flash('error',"Username atau password salah!!");
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
