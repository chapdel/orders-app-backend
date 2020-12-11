<?php

namespace App\Orchid\Screens\Shop;

use Orchid\Screen\Screen;

class ShopDetailsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ShopDetailsScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'ShopDetailsScreen';

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
