<?php

namespace App\Orchid\Screens\Restaurant;

use Orchid\Screen\Screen;

class RestaurantCreateScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'RestaurantCreateScreen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'RestaurantCreateScreen';

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
