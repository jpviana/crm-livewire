<div>
    <x-card title="Recovery password" shadow class="mx-auto w-[450px]">
        @if($message)
            <x-alert icon="o-exclamation-triangle" class="alert-success mb-4">
                <span>{{$message}}</span>
            </x-alert>
        @endif

        <x-form wire:submit="recovery">
            <x-input label="Email" wire:model="email"/>

            <x-slot:actions>
                <div class="w-full flex items-center justify-between">
                    <x-button label="Sand E-mail" class="btn-primary btn-sm" type="submit" spinner="submit"/>
                    <a wire:navigate href="{{redirect()->back()}}" class="link-primary">Back</a>
                </div>
            </x-slot:actions>
        </x-form>
    </x-card>
</div>
