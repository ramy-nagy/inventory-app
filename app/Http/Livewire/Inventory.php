<?php

namespace App\Http\Livewire;

use App\Models\Inventory as ModelsInventory;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sn;
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
                    $this->sn= "";
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
        $models = ModelsInventory::where('short', 0)->select('id', 'sn', 'article_name')->orderBy('updated_at','desc')->paginate(10);

        return view('livewire.inventory', compact('models'));
    }
}
