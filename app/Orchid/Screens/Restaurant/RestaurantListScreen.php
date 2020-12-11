<?php

namespace App\Orchid\Screens\Restaurant;

use App\Models\Restaurant;
use App\Orchid\Layouts\Restaurant\RestaurantListTable;
use Orchid\Screen\Screen;

class RestaurantListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Restaurants';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All registered restaurants';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'restaurants' => Restaurant::paginate()
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
            RestaurantListTable::class
        ];
    }
}
