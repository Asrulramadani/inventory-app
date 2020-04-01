<?php

namespace App\Livewire\Stock;

use App\Models\Category;
use App\Models\Stock;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $category_list;
    public $unit_list;


    public $idEdit;
    public $item_code;
    public $name;
    public $id_category;
    public $id_unit;
    public $total_stock;





    public function create(){
        $this->validate([
            'name'=>['required','min:3'],
            'id_unit'=>['required','numeric'],
            'id_category'=>['required', 'numeric'],
            'total_stock'=>['required','numeric'],
        ]);

        $stock = [
            'item_code'=>$this->generateItemCode($this->name),
            'name'=>$this->name,
            'id_unit'=>$this->id_unit,
            'id_category'=>$this->id_category,
            'stock'=>$this->total_stock,
        ];

        Stock::create($stock);
        // $this->dispatch('userAdded');
        session()->flash('message', "Berhasil menambahkan data");

        $this->item_code = "";
        $this->name = "";
        $this->id_unit = "";
        $this->id_category = "";
        $this->total_stock = "";
    }

    public function delete($id){
        Stock::destroy($id);
        session()->flash('message', "Berhasil menghapus data");
    }

    public function show($id){
        $stock = Stock::find($id);
        $this->idEdit = $id;
        $this->item_code = $stock->item_code;
        $this->name = $stock->name;
        $this->id_unit = $stock->id_unit;
        $this->id_category = $stock->id_category;
        $this->total_stock = $stock->stock;
    }

    public function update() {
      $stock = Stock::find($this->idEdit);
        if($stock){

            $this->validate([
                'item_code'=>['required','min:3'],
                'name'=>['required','min:3'],
                'id_unit'=>['required','numeric'],
                'id_category'=>['required', 'numeric'],
                'total_stock'=>['required','numeric'],
            ]);


        $stock->item_code = $this->generateItemCode($this->name);
        $stock->name = $this->name;
        $stock->id_unit = $this->id_unit;
        $stock->id_category = $this->id_category;
        $stock->stock = $this->total_stock;

        $stock->save();
        session()->flash("message", "Berhasil mengubah data");

        $this->item_code = "";
        $this->name = "";
        $this->id_unit = "";
        $this->id_category = "";
        $this->total_stock = "";
        }
        else{
            session()->flash("message", "gagal mengubah data");
        }
    }

    public function resetForm(){
        $this->item_code = "";
        $this->name = "";
        $this->id_unit = "";
        $this->id_category = "";
        $this->total_stock = "";
    }

    public function generateItemCode(){
        $minutes = date('i');
        $hours = date('H');
        $itemCode = 'ITM' . $minutes . $hours . strtoupper(substr($this->name, 0, 3));

        return $itemCode;
    }


    public function render()
    {
        $stocks = Stock::latest()->paginate(5);
        $this->category_list = Category::get();
        $this->unit_list = Unit::get();


        return view('livewire.stock.index',[
            'stocks'=>$stocks,
            'categories'=> $this->category_list,
            'units'=> $this->unit_list,
        ]);
    }
}
