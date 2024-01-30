<?php

namespace App\Livewire\Dashboard;

use App\Models\InTransaction;
use App\Models\OutTransaction;
use App\Models\Stock;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $stock = Stock::count();
        $user = User::count();
        $outTransaction = OutTransaction::count();
        $inTransaction = InTransaction::count();


        // $inTransactions = InTransaction::join('stocks','in_transactions.id_stock', 'stocks.id')->orderBy('in_transactions.id', 'desc')->latest()->take(5)->get();
        $inTransactions = InTransaction::select('in_transactions.*', 'stocks.name', 'stocks.id_unit', 'units.name AS unit')->join('stocks', 'in_transactions.id_stock', '=', 'stocks.id')->join('units', 'stocks.id_unit', '=', 'units.id')->latest()->take(5)->get();

        $outTransactions = OutTransaction::select('out_transactions.*', 'stocks.name', 'stocks.id_unit', 'units.name AS unit')->join('stocks', 'out_transactions.id_stock', '=', 'stocks.id')->join('units', 'stocks.id_unit', '=', 'units.id')->latest()->take(5)->get();

        // $outTransactions = OutTransaction::join('stocks', 'stocks.id', 'out_transactions.id_stock')->latest()->take(5)->get();

        // dd($inTransactions);
        return view('livewire.dashboard.index', [
            'stock' => $stock,
            'user' => $user,
            'outTransaction' => $outTransaction,
            'inTransaction' => $inTransaction,
            'outTransactions' => $outTransactions,
            'inTransactions' => $inTransactions,
        ]);
    }
}
