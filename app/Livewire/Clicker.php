<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination;

    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    public function createNewUser(){
        Log::info('clicked');
        // $this->validate([
        //   'name' => 'required|min:2|max:50',
        //   'email' => 'required|email|unique:users',
        //   'password' => 'required|min:8'
        // ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' =>  $this->password,
        ]);

        $this->reset(['name','email','password']);
        request()->session()->flash('success','User has successfully created !!');
    }

    public function render()
    {

        $users= User::paginate(5);
        return view('livewire.clicker',compact('users'));
    }
}
