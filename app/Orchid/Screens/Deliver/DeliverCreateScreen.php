<?php

namespace App\Orchid\Screens\Deliver;

use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DeliverCreateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Manage delivers';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Create new deliver';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(User $user): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make(__('Save deliver'))
                ->icon('plus')
                ->class('btn-success p-1')
                ->method('save'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
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
                Select::make('city')
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
            ])
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => [
                'required', 'min:3'
            ],
            'city' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', 'unique:users'
            ],
            'password' => [
                'required', 'string', 'min:8'
            ],
        ]);



        $user = User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
        ]);

        $user->deliver()->create([
            'city' => $request->city
        ]);



        Toast::info(__('Deliver was added'));

        return redirect()->back();
    }
}
