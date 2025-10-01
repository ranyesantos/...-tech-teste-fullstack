<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('at_sign')
                    ->required()
                    ->label('Username')
                    ->unique()
                    ->disabled(),

                TextInput::make('name')
                    ->required()
                    ->label('Nome')
                    ->disabled(),

                TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email')
                    ->disabled(),
            ]);
    }
}
