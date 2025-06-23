<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Login;
use Filament\Pages\Page;
use Illuminate\Validation\ValidationException;
use PHPUnit\Framework\MockObject\NeverReturningMethodException;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;

class LoginCustom extends Login
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getLoginFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            )
        ];
    }

    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
            ->label(('Username'))
            //->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex => 1']);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('Password'))
            ->password()
            ->required()
            ->autocomplete('current-password')
            ->revealable()
            ->extraInputAttributes(['tabindex => 2']);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $login_type = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        return [
            //'email' => $data['email'],
            $login_type => $data['login'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('Login gagal. Silakan coba lagi.'),
        ]);
    }

    public function authenticate(): LoginResponse|null
    {
        $data = $this->form->getState();

        $loginType = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($loginType, $data['login'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            $this->throwFailureValidationException();
        }

        // if ($user->status_akun == 0) {
        //     throw ValidationException::withMessages([
        //         'data.login' => __('Akun Anda belum diaktivasi oleh admin.'),
        //     ]);
        // }

        Filament::auth()->login($user, $data['remember'] ?? true);

        return app(LoginResponse::class);
    }
}