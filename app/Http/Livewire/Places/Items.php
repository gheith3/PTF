<?php

namespace App\Http\Livewire\Places;

use App\Models\Place;
use Illuminate\Support\Collection;
use Livewire\Component;

class Items extends Component
{
    public Collection $places;
    protected $listeners = ['places-list-updated' => 'updateList'];

    public function mount()
    {
        $this->updateList();
    }

    public function updateList(){
        $this->places = Place::get()->sortByDesc('id');
    }

    public function render()
    {
        return view('livewire.places.items');
    }
}
