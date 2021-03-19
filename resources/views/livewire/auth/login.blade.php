<div>
    <div class="card-body">

        <form method="POST" wire:submit.prevent="submit">
            @csrf
            <div class="form-group">
                <x-jet-label value="{{ __('Phone') }}"/>

                <x-jet-input class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" type="tel"
                             wire:model.lazy="form.phone" required/>
                <x-jet-input-error for="phone"></x-jet-input-error>
            </div>

            <div class="form-group">
                <x-jet-label value="{{ __('Password') }}"/>

                <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                             wire:model.lazy="form.password" required autocomplete="current-password"/>
                <x-jet-input-error for="password"></x-jet-input-error>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <x-jet-checkbox id="remember_me" name="remember" wire:model.lazy="form.remember"/>
                    <label class="custom-control-label" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div>
                <x-jet-validation-errors class="mb-3 rounded-0"/>
            </div>
            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    @if (Route::has('password.request'))
                        <a class="text-muted mr-3" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif




                    <x-jet-button>
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </div>
        </form>
    </div>
</div>
