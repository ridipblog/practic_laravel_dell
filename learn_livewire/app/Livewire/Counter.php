<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count=0;
    public $defaultCountValue;
    public function mount($defaultCountValue)
    {
        $this->defaultCountValue=$defaultCountValue;
        $this->count=$this->defaultCountValue;
    }
    public function increment(){
        $this->count++;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
