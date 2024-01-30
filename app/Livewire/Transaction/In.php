<?php

namespace App\Livewire\Transaction;

use App\Models\InTransaction;
use App\Models\Stock;
use Livewire\Component;
use Livewire\WithPagination;

class In extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public $idEdit;


    public $stockCategory;
    public $stockUnit;
    public $totalItemBeforeEdit;

    public $transaction_code;
    public $id_stock;
    public $total_item;
    public $information;


    public function delete($id){
        $transaction = InTransaction::find($id);

        if($transaction) {
            $stock = Stock::find($transaction->id_stock);
            $stock->stock = $stock->stock - $transaction->total_item;
            $stock->save();

            InTransaction::destroy($id);
            session()->flash('message', "Berhasil menghapus data");
        }

    }


    public function create(){
        $this->validate([
            'total_item'=>['required','numeric'],
        ]);

        $stock = Stock::find($this->id_stock);
        $stock->stock = $this->total_item + $stock->stock;
        $stock->save();

        $transaction = [
            'transaction_code'=>$this->generateTransactionCode($stock->name),
            'id_stock'=>$this->id_stock,
            'total_item'=>$this->total_item,
            'information'=>$this->information ? $this->information : "-",
        ];

        InTransaction::create($transaction);
        session()->flash('message', "Berhasil menambahkan data");

        $this->transaction_code = "";
        $this->id_stock = "";
        $this->total_item = "";
        $this->information = "";
    }

    public function show($id){
        $transaction = InTransaction::find($id);

        if($transaction){
            $this->transaction_code = $transaction->transaction_code;
            $this->id_stock = $transaction->id_stock;
            $this->total_item = $transaction->total_item;
            $this->information = $transaction->information;

            $this->idEdit = $id;
            $this->totalItemBeforeEdit = $transaction->total_item;

            $this->stockCategory = $transaction->stock->category->name;
            $this->stockUnit = $transaction->stock->unit->name;
        };

    }

    public function update(){
        $this->validate([
            'total_item'=>['required','numeric'],
        ]);

        $transaction = InTransaction::find($this->idEdit);
        if ($transaction) {
            // validasi apakah total item berubah
            if($this->total_item > $this->totalItemBeforeEdit){
                $selisih = $this->total_item - $this->totalItemBeforeEdit;

                // cari stok dan ubah total stok
                $stock = Stock::find($transaction->id_stock);
                $stock->stock = $stock->stock + $selisih;
                $stock->save();
            }elseif ($this->total_item < $this->totalItemBeforeEdit) {
                $selisih = $this->totalItemBeforeEdit - $this->total_item;

                // cari stok dan ubah total stok
                $stock = Stock::find($transaction->id_stock);
                $stock->stock = $stock->stock - $selisih;
                $stock->save();
            }

            $transaction->total_item = $this->total_item;
            $transaction->information = $this->information ?? "-";
            $transaction->save();

            session()->flash('message', "Berhasil mengubah data");

        }

        $this->transaction_code = "";
        $this->id_stock = "";
        $this->total_item = "";
        $this->information = "";
    }



    public function getStockInformation(){
        // dd($this->idSelectedStock);
        $stock = Stock::find($this->id_stock);
        $this->stockCategory = $stock->category->name;
        // dd($this->stockCategory);
        $this->stockUnit = $stock->unit->name;
    }


    public function generateTransactionCode($stockName){
        $minutes = date('i');
        $hours = date('H');
        $transactionCode = 'INTR' . $minutes . $hours .strtoupper(substr($stockName, 0, 3)).$this->total_item;

        return $transactionCode;
    }

    public function render()
    {
        $transactions =InTransaction::select('in_transactions.*', 'stocks.name AS name', 'stocks.id_unit', 'units.name AS unit', 'categories.name AS category')->join('stocks', 'in_transactions.id_stock', '=', 'stocks.id')->join('units', 'stocks.id_unit', '=', 'units.id')->join('categories', 'stocks.id_category', '=', 'categories.id')->latest()->paginate(5);

        $stocks = Stock::get();

        return view('livewire.transaction.in',[
            'transactions'=>$transactions,
            'stocks'=>$stocks,
        ]);
    }
}
