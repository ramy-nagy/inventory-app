<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class InventoryStatistic extends Component
{
    public function render()
    {
     $InventoryStatistics =  Inventory::where('status', 'A')->select('article_name', 'short', DB::raw("count('article_name') as count_article_name"))
        ->groupBy('article_name')->orderBy('count_article_name', 'DESC')->get();
        return view('livewire.inventory-statistic', compact('InventoryStatistics'));
    }
}
