<?php

namespace App\Orchid;

use App\Models\Deliver;
use App\Models\Restaurant;
use App\Models\User;
use Laravel\Scout\Searchable;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return ItemMenu[]
     */
    public function registerMainMenu(): array
    {
        return [
            ItemMenu::label('Orders')
                ->icon('basket-loaded')
                ->route('orders')
                ->title('App management'),

            ItemMenu::label('Shops')->route('shops')->icon('bag'),
            ItemMenu::label('Restaurants')->route('restaurants')->icon('building'),
            ItemMenu::label('Delivers')->route('delivers')->icon('directions'),
            ItemMenu::label('Files')
                ->icon('folder')
                ->route('platform.files'),
            ItemMenu::label('Users')
                ->icon('people')
                ->route('platform.systems.users')
                ->title('Administrations'),
            ItemMenu::label('Roles')->route('platform.systems.roles')->icon('lock'),
            //ItemMenu::label('Administrators')->route('platform.systems.roles')->icon('building'),

        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            ItemMenu::label('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemMenu[]
     */
    public function registerSystemMenu(): array
    {
        return [
            ItemMenu::label(__('Access rights'))
                ->icon('lock')
                ->slug('Auth')
                ->active('platform.systems.*')
                ->permission('platform.systems.index')
                ->sort(1000),

            ItemMenu::label(__('Users'))
                ->place('Auth')
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->sort(1000)
                ->title(__('All registered users')),

            ItemMenu::label(__('Roles'))
                ->place('Auth')
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->sort(1000)
                ->title(__('A Role defines a set of tasks a user assigned the role is allowed to perform.')),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Systems'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }

    /**
     * @return Searchable|string[]
     */
    public function registerSearchModels(): array
    {
        return [
            // ...Models
            //User::class,
            //Order::class,
            //Shop::class,
            //Restaurant::class,
            //Deliver::class
        ];
    }
}
