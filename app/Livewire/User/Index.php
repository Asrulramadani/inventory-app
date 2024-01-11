<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;
    protected $paginationTheme = "bootstrap";



    public $user;

    public $idEdit;
    public $name;
    public $password;
    public $newPassword;
    public $email;
    public $role;



    public function create(){
        $this->validate([
            'name'=>['required','min:3'],
            'password'=>['required','min:3'],
            'email'=>['required','min:3'],
            'role'=>['required','in:operator,admin'],
        ]);

        $user = [
            'name'=> $this->name,
            'password'=> bcrypt($this->password),
            'email'=> $this->email,
            'role'=> $this->role
        ];

        User::create($user);
        // $this->dispatch('userAdded');
        session()->flash('message', "Berhasil menambahkan user");

        $this->name = "";
        $this->password = "";
        $this->email = "";
    }

    public function delete($id){
        User::destroy($id);
        session()->flash('message', "Berhasil menghapus data");
    }

    public function show($id){
        $user = User::find($id);
        $this->idEdit = $id;
        $this->name = $user->name;
        $this->password = $user->password;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function update() {
      $user = User::find($this->idEdit);
        if($user){
            $password = $user->password;
          // validate input
          if ($this->newPassword !== "" && $this->newPassword != null) {
                $this->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','min:3'],
                    'newPassword'=>['required','min:3'],
                    'role'=>['required','in:operator,admin'],
                ]);

                $password = bcrypt($this->newPassword);
            }else {
                $this->validate([
                    'name'=>['required','min:3'],
                    'email'=>['required','min:3'],
                    'role'=>['required','in:operator,admin'],
                ]);
            }

            $user->name=$this->name;
            $user->email=$this->email;
            $user->password=$password;
            $user->role=$this->role;

            $user->save();
            session()->flash("message", "Berhasil mengubah data");

            $this->name = "";
            $this->email = "";
            $this->password = "";
            $this->newPassword = "";
            $this->role = "";
        }
    }


    public function resetForm(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->newPassword = "";
        $this->role = "";
    }


    public function render()
    {
        $users = User::latest()->paginate(5);


        return view('livewire.user.index',[
            'users'=>$users,
        ]);
    }
}
