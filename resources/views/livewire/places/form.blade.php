<div>
    <form wire:submit.prevent="submit">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <x-jet-label value="{{ __('Type') }}"/>
                    <select wire:model="place.type_id" class="form-select form-control {{ $errors->has('place.type_id') ? 'is-invalid' : '' }}">
                        <option selected>select type..</option>
                        @foreach($this->types() as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="place.type_id"></x-jet-input-error>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <x-jet-label value="{{ __('Name') }}"/>
                    <x-jet-input class="{{ $errors->has('place.name') ? 'is-invalid' : '' }}" type="tel"
                                 wire:model.lazy="place.name" required/>
                    <x-jet-input-error for="place.name"></x-jet-input-error>
                </div>
            </div>

            <div class="col-12 pt-2 pb-2">
                <x-jet-validation-errors class="mb-3 rounded-0"/>
            </div>

            <div class="col-12">
                <div class="d-flex justify-content-end align-items-baseline">
                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </form>
</div>
