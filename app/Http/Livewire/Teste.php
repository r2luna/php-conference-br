<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Teste extends Component
{
    public $number = 0;

    public function render()
    {
        return view('livewire.teste');
    }

    public function minus()
    {
        $this->number --;
    }

    public function plus()
    {
        $this->validate([
            'number' => ['numeric', 'max:10']
        ]);

        $this->number ++;
    }
}
