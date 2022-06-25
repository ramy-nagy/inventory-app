<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <style>
            .form-select  {
                --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
                --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
                --tw-border-opacity: 1;
                border-radius: 0.375rem;
                width: 100%;
                display: block;
                margin-top: 0.25rem;
                margin-bottom: 5px;
                color: #000
            }
        </style>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('store-two-factor.login') }}">
            @csrf

            <div>
                <x-jet-label for="store" value="{{ __('Store') }}" />
                <select class="form-select block mt-1 w-full" name="store" aria-label="Default select example">
                    <option selected>select store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id ?? '' }}">{{ $store->name ?? '' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="passcode" value="{{ __('Passcode') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="number" name="passcode" required
                    autocomplete="current-passcode" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
