<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Bus;
use Livewire\Component;

class ImportProgress extends Component
{
    public $batchId, $importing = false, $importFinished = false;

    public function getImportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function updateImportProgress()
    {

        $this->importFinished = $this->importBatch->finished();

        if ($this->importFinished) {
            $this->importing = false;
            $this->emitTo('inventory', '$refresh');
        }
    }

    public function alert($type = null, $message = null)
    {
        $this->dispatchBrowserEvent('alert', ['type' => $type, 'message' => $message]);
    }

    public function render()
    {            
        if ($this->batchId) {
            $this->importing = true;
        }
        return view('livewire.import-progress');
    }
}
