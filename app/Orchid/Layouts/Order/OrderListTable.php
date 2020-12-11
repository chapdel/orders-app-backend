<?php

namespace App\Orchid\Layouts\Order;

use App\Models\Order;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'orders';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('uid', 'ID')
                ->render(function (Order $order) {
                    return Link::make($order->uid)
                        ->route('orders');
                }),
            TD::set('status', 'Status'),
            TD::set('created_at', 'Created'),
        ];
    }
}
