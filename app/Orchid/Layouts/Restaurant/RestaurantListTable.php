<?php

namespace App\Orchid\Layouts\Restaurant;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class RestaurantListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'restaurants';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('name', 'Name'),
            TD::set('phone', 'Phone'),
            TD::set('created_at', 'Created'),
        ];
    }
}
