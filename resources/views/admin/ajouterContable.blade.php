@extends('layouts.Admin.master')

@section('content')
    <form method="POST" action="{{ route('registerContable') }}">
        @csrf
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @if($errors->has('name'))
                <div class="text-danger mt-1">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @if($errors->has('email'))
                <div class="text-danger mt-1">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Hidden Role -->
        <input type="hidden" name="role" value="{{ request()->query('role') }}">

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
            @if($errors->has('password'))
                <div class="text-danger mt-1">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
            @if($errors->has('password_confirmation'))
                <div class="text-danger mt-1">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <!-- Salaire -->
        <div class="mb-3">
            <label for="salaire" class="form-label">{{ __('Salaire') }}</label>
            <input id="salaire" class="form-control" type="number" name="salaire" value="{{ old('salaire') }}" required autofocus autocomplete="salaire">
            @if($errors->has('salaire'))
                <div class="text-danger mt-1">
                    {{ $errors->first('salaire') }}
                </div>
            @endif
        </div>

        <!-- Submit Button and Login Link -->
        <div class="d-flex justify-content-end align-items-center mt-4">
            <a class="text-decoration-underline text-muted d-none" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary">
                {{ __('Enregistrer') }}
            </button>
        </div>
    </form>
@endsection
