<div>
    <div class="card" wire:init="sendPin">
        <div class="card-body">
            <h4 class="text-center">
                Confirm Your Phone Number
            </h4>
            <h6 class="text-center">
                we sent pin for your phone number <br>
                <span class="badge badge-light text-">
                    {{$user->phone}}
                </span>
            </h6>
            <div id="timer-area" class="text-center text-danger">
                <span>pin expired after</span>
                <div id="confirm-timer">00:00:00</div>
            </div>
            <form wire:submit.prevent="confirmPin">


                <div class="form-group">
                    <x-jet-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}"
                                 wire:model="form.code"
                                 type="tel" name="code"/>
                    <x-jet-input-error for="code"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-validation-errors class="mb-3 rounded-0"/>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <x-jet-button>
                            {{ __('Confirm') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push("scripts")
        <script src="{{asset("js/easytimer.js")}}"></script>
        <script>

            window.addEventListener('pin:start-timer', event => {
                console.log("here")
                var timer = new easytimer.Timer();
                timer.start({countdown: true, startValues: {seconds: event.detail.seconds}});
                timer.addEventListener('secondsUpdated', function (e) {
                    $('#confirm-timer').html(timer.getTimeValues().toString());
                });
                timer.addEventListener('targetAchieved', function (e) {
                    //Livewire.emit("timerComplete");
                    swal({
                        title: "",
                        text: "timer complete without any action from you",
                        icon: "warning",
                    });
                    $("#timer-area").hide("slow");
                });
            });
        </script>
    @endpush
</div>
