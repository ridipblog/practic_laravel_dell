<?php

namespace App\Livewire\EmitListner;

use Livewire\Component;

class ChildComponent extends Component
{
    public function triggerEvent($data){
        $this->dispatch('childEvent',['message'=>$data]);
    }
    public function render()
    {
        return view('livewire.emit-listner.child-component');
    }
}
