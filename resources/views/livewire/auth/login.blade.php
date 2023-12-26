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

            <x-slot:actions>
                <x-button label="Cancel" type="reset"/>
                <x-button label="Login" class="btn-primary" type="submit" spinner="submit"/>
            </x-slot:actions>
        </x-form>

    </x-card>
</div>
