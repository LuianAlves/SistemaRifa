<?php


namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register;

class ClienteRegisterPanel extends Register
{
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

                TextInput::make('password')
                    ->label("Senha")
                    ->required()
                    ->password()
                    ->maxLength(25),

                TextInput::make('password_confirmation')
                    ->label("Senha")
                    ->required()
                    ->password()
                    ->confirmed()
                    ->maxLength(25),

//                $this->getNameFormComponent(),
//                $this->getEmailFormComponent(),
//                $this->getPasswordFormComponent(),
//                $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}

