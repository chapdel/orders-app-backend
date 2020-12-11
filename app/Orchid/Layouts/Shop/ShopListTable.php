<?php

namespace App\Orchid\Layouts\Shop;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ShopListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'shops';

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
