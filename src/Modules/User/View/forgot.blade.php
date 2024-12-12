@extends('layouts.auth')

@section('title', 'Восстановление пароля')

@section('content')

    <x-form.auth-form
        action="{{route('user.forgotPassword')}}"
        method="POST"
        title="Забыли пароль?">

        @csrf

        <x-form.input-field
            name="email"
            :isError="$errors->has('email')"
            type="email"
            placeholder="E-mail"
            value="{{old('email')}}"
            required="true"/>
        @error('email')

        <x-form.error>{{$message}}</x-form.error>
        @enderror

        <x-form.primary-button>Восстановить</x-form.primary-button>

        <x-slot:social-auth>
        </x-slot:social-auth>

    </x-form.auth-form>

@endsection
