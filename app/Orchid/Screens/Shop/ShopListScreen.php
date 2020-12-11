<?php

namespace App\Orchid\Screens\Shop;

use App\Models\Order;
use App\Orchid\Layouts\Shop\ShopListTable;
use Orchid\Screen\Screen;

class ShopListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Shops';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All registered super market';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            "shops" => Order::paginate()
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
            ShopListTable::class,
        ];
    }
}
