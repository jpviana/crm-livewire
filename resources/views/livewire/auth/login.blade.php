<div>
    <x-card title="Login" shadow class="mx-auto w-[450px]">
        <x-form wire:submit="login">
            <x-input label="Email" wire:model="email"/>
            <x-input label="password" wire:model="password" type="password"/>

            <x-slot:actions>
                <x-button label="Cancel" type="reset"/>
                <x-button label="Login" class="btn-primary" type="submit" spinner="submit" />
            </x-slot:actions>
        </x-form>
        @error('invalidCredentials')
        <span>{{ $message }}</span>
        @enderror
    </x-card>
</div>
