<?php

namespace App\Orchid\Screens\Restaurant;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RestaurantCreateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Restaurant Management';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Create new restaurant';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
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
            Button::make(__('Save restaurant'))
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
            /* Layout::rows([
                Input::make('name')
                    ->type('text')
                    ->max(255)
                    ->required()
                    ->title(__('Name'))
                    ->placeholder(__('Name')),
                Input::make('phone')
                    ->type('text')
                    ->required()
                    ->title(__('Phone number'))
                    ->placeholder(__('Phone number')),
                TextArea::make('bio')
                    ->title('Description')
                    ->rows(5)
                    ->placeholder('Insert text here ...')
            ]) */];
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
            'phone' => [
                'required',
            ],
        ]);



        Restaurant::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        Toast::info(__('Restaurant was added'));

        //return redirect()->back();
    }
}
