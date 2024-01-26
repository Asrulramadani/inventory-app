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


        $inTransactions = InTransaction::latest()->take(5)->get();
        $outTransactions = OutTransaction::latest()->take(5)->get();

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
