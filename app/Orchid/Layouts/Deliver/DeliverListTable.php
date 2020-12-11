<?php

namespace App\Orchid\Layouts\Deliver;

use App\Models\Deliver;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DeliverListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'delivers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('user', 'Name')
                ->render(function (Deliver $deliver) {
                    return Link::make($deliver->user->name)
                        ->route('delivers');
                }),

            TD::set('city', 'Zone'),
            TD::set('total_orders', 'Total orders'),
            TD::set('status', 'Status'),
            TD::set('created_at', 'Created'),
        ];
    }
}
