<?php

namespace App\Orchid\Screens\Orders;

use Orchid\Screen\Screen;

class OrdersDetailsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'OrdersDetailsScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'OrdersDetailsScreen';

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
        return [];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [];
    }
}
