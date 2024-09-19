<?php

namespace App\Livewire\EmitListner;

use Livewire\Component;

class ParentComponent extends Component
{
    public $message;
    protected $listeners=['childEvent'=>'handleChildEvent'];
    public function handleChildEvent($data){
        $this->message=$data;
    }
    public function render()
    {
        return view('livewire.emit-listner.parent-component');
    }
}
