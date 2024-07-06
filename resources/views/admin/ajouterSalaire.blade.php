{{-- @extends('layouts.Admin.master')

@section('content')
<x-guest-layout>
    <form method="POST" action="{{ route('contable.store') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="salair" :value="__('Salaire')" />
            <x-text-input id="salaire" class="block mt-1 w-full" type="text" name="salaire" :value="old('salaire')" required autofocus autocomplete="salaire" />
            <x-input-error :messages="$errors->get('salaire')" class="mt-2" />
        </div>

        <input type="text" name="admin_id" value="{{ Auth::user()->admin->id }}">
        <input type="hidden" name="user_id" value="{{ $userId }}">
        <x-primary-button class="ms-4">
                {{ __('Terminer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection --}}