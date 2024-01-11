<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $category;

    public $idEdit;
    public $name;



    public function create(){
        $this->validate([
            'name'=>['required','min:3'],
        ]);

        $category = [
            'name'=> $this->name,
        ];

        Category::create($category);
        session()->flash('message', "Berhasil menambahkan kategori");

        $this->name = "";
    }

    public function delete($id){
        Category::destroy($id);
        session()->flash('message', "Berhasil menghapus data");
    }

    public function show($id){
        $category = Category::find($id);
        $this->idEdit = $id;
        $this->name = $category->name;
    }

    public function update() {
      $category = Category::find($this->idEdit);
        if($category){
            $this->validate([
                'name'=>['required','min:3'],
            ]);
            $category->name = $this->name;
             $category->save();
            session()->flash("message", "Berhasil mengubah data");

            $this->name = "";
        }
    }


    public function resetForm(){
        $this->name = "";
    }


    public function render()
    {
        $categories = Category::latest()->paginate(5);


        return view('livewire.category.index',[
            'categories'=>$categories,
        ]);
    }
}
