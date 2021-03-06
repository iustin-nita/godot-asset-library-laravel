@extends('layouts.app')

@section('title', __('Edit profile'))

@section('content')
<div class="container">
  <form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="text-center text-xl font-medium">
      {{ __('Edit profile') }}
    </div>

    <section class="w-full max-w-xs mx-auto mt-8 bg-white dark:bg-gray-800 rounded shadow p-4">
        @component('components/form-input', [
          'name' => 'username',
          'value' => $user->username,
          'label' => __('Username'),
          'placeholder' => __('Username'),
          'required' => true,
          'maxlength' => App\User::USERNAME_MAX_LENGTH,
          'autofocus' => true,
          'autocomplete' => 'username',
        ])
        {{ __('Can only contain alphanumeric characters, underscores and dashes. Must not begin with a number, underscore or dash.') }}
        @endcomponent

        @component('components/form-input', [
          'name' => 'full_name',
          'value' => $user->full_name,
          'label' => __('Full name'),
          'placeholder' => __('Full name'),
          'maxlength' => App\User::FULL_NAME_MAX_LENGTH,
        ])
        @endcomponent

        @component('components/form-input', [
          'type' => 'email',
          'name' => 'email',
          'value' => $user->email,
          'label' => __('Email address'),
          'disabled' => true,
        ])
        {{ __('Changing your email address is not implemented yet. Sorry!') }}
        @endcomponent

        @component('components/form-input', [
          'type' => 'password',
          'name' => 'current_password',
          'label' => __('Current password'),
          'autocomplete' => 'current-password',
        ])
        {{ __("Required if you're changing your password below. Keep this field empty if you don't want to change your password.") }}
        @endcomponent

        @component('components/form-input', [
          'type' => 'password',
          'name' => 'new_password',
          'autocomplete' => 'new-password',
          'label' => __('New password'),
          'minlength' => App\User::PASSWORD_MIN_LENGTH,
          'autocomplete' => 'new-password',
        ])
        {{ __('Must be at least :passwordMinLength characters long.', ['passwordMinLength' => App\User::PASSWORD_MIN_LENGTH]) }}
        @endcomponent

        @component('components/form-input', [
          'type' => 'password',
          'name' => 'new_password_confirmation',
          'label' => __('Confirm new password'),
          'minlength' => App\User::PASSWORD_MIN_LENGTH,
          'autocomplete' => 'new-password',
        ])
        @endcomponent

      <button class="button button-primary w-full" type="submit" data-loading>
        {{ __('Save changes') }}
      </button>
    </section>
  </form>
</div>
@endsection
