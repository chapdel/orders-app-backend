<?php

namespace App\Orchid\Screens\Deliver;

use App\Models\Deliver;
use App\Orchid\Layouts\Deliver\DeliverListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class DeliverListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Delivers';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'List of delivers';

    /**
     * @var bool
     */
    public $exists = false;

    public function with(): array
    {
        return ['user'];
    }

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {

        return [
            'delivers' => Deliver::with(['user'])->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make(__('Add new'))
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
            DeliverListTable::class,
        ];
    }

    /**
     * @param Deliver $order
     *
     * @return array
     */
    public function asyncGetDeliver(Deliver $order): array
    {
        return [
            'order' => $order,
        ];
    }



    /**
     * @param Request $request
     */
    public function remove(Request $request)
    {
        Deliver::findOrFail($request->get('id'))
            ->delete();

        Toast::info(__('Deliver was removed'));
    }
}
