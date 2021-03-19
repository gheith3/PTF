<div>
    <div class="card">
        <div class="card-body">
            <form method="POST" wire:submit.prevent="submit">
                @csrf

                <div class="form-group">
                    <x-jet-label value="Phone" />
                    <x-jet-input type="tel" wire:model.lazy="form.phone" required autofocus />
                </div>

                <div>
                    <x-jet-validation-errors class="mb-3 rounded-0"/>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-jet-button>
                        {{ __('Send Pin code') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>
