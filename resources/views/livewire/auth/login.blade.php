<div>
    @if($errors->hasAny(['invalidCredentials', 'rateLimiter']))
        <x-alert icon="o-home" class="alert-warning">
            @error('invalidCredentials')
            {{$message}}
            @enderror
            @error('rateLimiter')
            {{$message}}
            @enderror
        </x-alert>
    @endif
    <x-card title="Login" shadow class="mx-auto w-[450px]">
        <x-form wire:submit="login">
            <x-input label="Email" wire:model="email"/>
            <x-input label="password" wire:model="password" type="password"/>
            <div>
                <a href="{{route('auth.password.recovery')}}"  class="link-primary textarea-xs">Forgot Password</a>
            </div>
            <x-slot:actions>
                <div class="w-full flex items-center justify-between">
                    <a wire:navigate href="{{route('auth.register')}}" class="link-primary">Create account</a>
                    <div>
                        <x-button label="Login" class="btn-primary" type="submit" spinner="submit"/>
                    </div>
                </div>
            </x-slot:actions>
        </x-form>

    </x-card>
</div>
