<?php

namespace App\Livewire\Popup;

use Livewire\Component;

class Page extends Component
{
    public $is_show=false;
    public function showPoppop($value){
        $this->is_show=$value;

    }
    public function render()
    {
        // dd($this->is_show);
        return view('livewire.popup.page');
    }
}
