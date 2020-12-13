<?php

namespace App\Orchid\Layouts\Deliver;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class DeliverCreateLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Name'))
                ->placeholder(__('Name')),
            Input::make('email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
            Select::make('select')
                ->options([
                    'Yaoundé'   => 'Yaoundé',
                    'Douala' => 'Douala',
                ])
                ->title('Select Deliver Zone')->required(),
            Input::make('password')
                ->type('password')
                ->required()
                ->title(__('Password'))
                ->placeholder(__('Password')),
        ];
    }
}
