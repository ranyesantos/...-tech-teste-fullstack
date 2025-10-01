<?php

declare(strict_types=1);

namespace App\Filament\Admin\Resources\Subreddits\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;

final class SubredditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make([
                    TextInput::make('name')
                        ->required()
                        ->minLength(2)
                        ->maxLength(255)
                        ->unique()
                        ->helperText('Será exibido com "/r/" no início'),

                    TextInput::make('display_name')
                        ->required()
                        ->minLength(2)
                        ->maxLength(255)
                        ->label('Nome de exibição'),

                    Textarea::make('description')
                        ->required()
                        ->minLength(2)
                        ->maxLength(255)
                        ->label('Descrição do subreddit')
                        ->rows(4),
                ])->columnSpan(2),
            ]);
    }
}
