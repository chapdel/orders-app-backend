<?php

namespace App\Orchid\Screens\Orders;

use App\Models\Order;
use App\Orchid\Layouts\Order\OrderListTable;
use App\Orchid\Layouts\User\UserFiltersLayout;
use App\Orchid\Layouts\User\UserListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class OdersListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Orders';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All active orders';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'orders' => Order::with([])
                //->filters()
                // ->filtersApplySelection(UserFiltersLayout::class)
                //->defaultSort('updated_at', 'desc')
                ->paginate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            OrderListTable::class,
        ];
    }
}
