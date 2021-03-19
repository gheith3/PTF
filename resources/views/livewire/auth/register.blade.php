<div>
    <div class="card-body">
            <form method="post" wire:submit.prevent="submit">

                <div class="form-group">
                    <x-jet-label value="{{ __('Name') }}"/>

                    <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                 wire:model="form.name"
                                 type="text" name="name"
                                 :value="old('name')" required autofocus autocomplete="name"/>
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Phone') }}"/>

                    <x-jet-input class="{{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                 wire:model="form.phone"
                                 type="tel" name="phone"
                                 :value="old('phone')" required autofocus autocomplete="phone"/>
                    <x-jet-input-error for="phone"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Password') }}"/>

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                 wire:model="form.password"
                                 name="password" required autocomplete="new-password"/>
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="form-group">
                    <x-jet-label value="{{ __('Confirm Password') }}"/>

                    <x-jet-input class="form-control" type="password" name="password_confirmation" required
                                 wire:model="form.password_confirmation"
                                 autocomplete="new-password"/>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms"/>
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                @endif
                <div>
                    <x-jet-validation-errors class="mb-3 rounded-0"/>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted mr-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button>
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>

    </div>
</div>
