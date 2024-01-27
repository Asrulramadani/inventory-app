<?php

namespace App\Livewire\MyProfile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Index extends Component
{

    use WithFileUploads;



    public $idUser, $username, $email,  $password, $photo, $newPhoto = null, $newPassword;

    public $isEdit = false;
    public $btnEditText = "Edit Profile";


    public function enableEdit(){
        $this->isEdit = !$this->isEdit;
        ($this->isEdit) ? $this->btnEditText = "Cancel" : $this->btnEditText = "Edit Profile";

    }

    public function update(){


        $user = User::find($this->idUser);
        if($user) {
            $password = $user->password;

            // validate input
            if ($this->newPassword !== "" && $this->newPassword != null) {
                $this->validate([
                        'username'=>['required','min:3'],
                        'email'=>['required','min:3'],
                        'newPassword'=>['required','min:3'],

                    ]);

                    $password = bcrypt($this->newPassword);
                }else {
                    $this->validate([
                        'username'=>['required','min:3'],
                        'email'=>['required','min:3'],

                    ]);
                }

            // upload file
            $photo = $user->photo;

            if($this->newPhoto) {
                if(Storage::exists($user->photo)){
                    Storage::delete($user->photo);
                }

                // dd($this->photo);

                $photo = $this->newPhoto->store("photos", "public");

            }
            // dd($photo);


            $user->name=$this->username;
            $user->email=$this->email;
            $user->password=$password;
            $user->photo = $photo;

            $user->save();
            session()->flash("message", "Berhasil mengubah data");

            $this->photo = $photo;
            $this->password = "";
            $this->newPassword = "";
            $this->enableEdit();
        }


    }

    public function mount(){

        $this->idUser = Auth::user()->id;
        $this->username = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->password = Auth::user()->password;
        $this->photo = Auth::user()->photo;
    }

    public function render()
    {
        return view('livewire.my-profile.index');
    }
}
