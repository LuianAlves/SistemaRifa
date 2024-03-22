<?php

declare(strict_types=1);

namespace App\Filament\Pages\Auth;

use App\Models\Cliente;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register;
use Override;

class ClienteRegisterPanel extends Register
{
    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label("Nome Completo")
                    ->required()
                    ->maxLength(255),

                TextInput::make('cpf')
                    ->label("CPF")
                    ->required()
                    ->mask('999.999.999/99')
                    ->maxLength(255),

                TextInput::make('email')
                    ->label("E-mail")
                    ->required()
                    ->email()
                    ->maxLength(255),

                TextInput::make('telefone')
                    ->label("WhatsApp")
                    ->required()
                    ->mask('(11) 99999-9999')
                    ->maxLength(15),

            ]);
    }

    #[Override]
    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(5);

            $this->data = $this->form->getState();

        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        Cliente::create($this->data);

        Notification::make()
            ->title('Cadastro realizado com sucesso!')
            ->body("Enviamos um e-mail para {$this->data['email']} com seus dados de acesso!.")
            ->success()
            ->send();

        $this->reset();

        return null;
    }
}

