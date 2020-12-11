<?php

namespace App\Orchid\Screens\Deliver;

use App\Models\Deliver;
use App\Models\User;
use App\Orchid\Layouts\Deliver\DeliverCreateLayout;
use Illuminate\Support\Facades\Request;
use Orchid\Alert\Toast;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;

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
            Button::make(__('Add new'))
                ->icon('plus')
                ->href(route('delivers.create')),
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
            DeliverCreateLayout::class
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

        dd('ddd');

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
