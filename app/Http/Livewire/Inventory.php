<?php

namespace App\Http\Livewire;

use App\Models\Inventory as ModelsInventory;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sn;
    protected $listeners = [
        '$refresh'
    ];
    public function alert($type = null, $message = null)
    {
        $this->dispatchBrowserEvent('alert', ['type' => $type, 'message' => $message]);
    }
 
    //  switch method
    public function updatedSn($sn)
    {
        if (strlen($this->sn) == 19) {
            try {
                $switch_model = ModelsInventory::where('sn', $this->sn)->firstOrFail();
                if ($switch_model->short == 1) {
                    $switch_model->update(['short' => 0]);
                    $this->alert('success', 'it,s Ok');
                    $this->sn = "";
                } else {
                    $this->alert('error', 'This SN Enterd Before');
                }
            } catch (\Exception $e) {
                $this->alert('error', 'Wrong SN');
            }
        }
    }

    public function render()
    {
        $models = ModelsInventory::where('short', 0)->select('id', 'sn', 'article_name', 'status')->orderBy('updated_at', 'desc')->paginate(10);
        $statistics =  ModelsInventory::where('status', 'A')->select('article_name', DB::raw("count('article_name') as count_article_name"), DB::raw("COUNT(case when short = 1 then 1 end) as count_short"))
            ->groupBy('article_name')->orderBy('count_article_name', 'DESC')->get();
        return view('livewire.inventory', compact('models', 'statistics'));
    }
}
