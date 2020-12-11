<?php

namespace App\Orchid\Screens\Shop;

use Orchid\Screen\Screen;

class ShopCreateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'ShopCreateScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'ShopCreateScreen';

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
