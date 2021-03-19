<?php

namespace App\Http\Livewire\Places;

use App\Models\Place;
use App\Models\PlacesType;
use Livewire\Component;

class Form extends Component
{
    public Place $place;
    public bool $isNewPlace = true;
    protected $rules = [
        "place.name" => "required|min:3",
        "place.type_id" => "required",
    ];
    public function mount(Place $passPlace = null)
    {
        $this->place = ($passPlace != null) ? $passPlace : new Place();
        $this->isNewPlace = true;
    }

    public function submit()
    {
        $this->isNewPlace = ($this->place->id == null);

        $this->validate();

        $this->place->user_id = auth()->id();
        $this->place->longitude = 100;
        $this->place->latitude = 200;
        $this->place->details = [];
        $this->place->save();

        if ($this->isNewPlace){
            $this->place->id = null;
            $this->place->name = "";
            $this->place->type_id = $this->types()->first()->id;
        }

        $this->emit("places-list-updated");
    }

    public function types()
    {
        return PlacesType::all();
    }

    public function render()
    {
        return view('livewire.places.form');
    }
}
