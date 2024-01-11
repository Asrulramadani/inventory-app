<?php

namespace App\Livewire\Unit;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $unit;

    public $idEdit;
    public $name;



    public function create(){
        $this->validate([
            'name'=>['required','min:3'],
        ]);

        $unit = [
            'name'=> $this->name,
        ];

        Unit::create($unit);
        session()->flash('message', "Berhasil menambahkan satuin");

        $this->name = "";
    }

    public function delete($id){
        Unit::destroy($id);
        session()->flash('message', "Berhasil menghapus data");
    }

    public function show($id){
        $unit = Unit::find($id);
        $this->idEdit = $id;
        $this->name = $unit->name;
    }

    public function update() {
      $unit = Unit::find($this->idEdit);
        if($unit){
            $this->validate([
                'name'=>['required','min:3'],
            ]);
            $unit->name = $this->name;
             $unit->save();
            session()->flash("message", "Berhasil mengubah data");

            $this->name = "";
        }
    }


    public function resetForm(){
        $this->name = "";
    }


    public function render()
    {
        $units = Unit::latest()->paginate(5);


        return view('livewire.unit.index',[
            'units'=>$units,
        ]);
    }
}
