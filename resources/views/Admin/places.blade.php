<x-app-layout>
    <div class="d-flex">
        <div>
            <h2 class="page-title">
                Empty page
            </h2>
        </div>
        <div class="ms-auto">
            <button
                data-bs-toggle="modal" data-bs-target="#modal-place-form"
                class="btn btn-primary btn-pill w-100">
                new place
            </button>
        </div>
    </div>

    <div class="mt-3">
        @livewire('places.items')
    </div>

    @push("modals")
        <div wire:ignore class="modal modal-blur fade"
             id="modal-place-form" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add a new Place</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('places.form')
                    </div>
                </div>
            </div>
        </div>
    @endpush

</x-app-layout>
