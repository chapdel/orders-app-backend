<?php

declare(strict_types=1);

use App\Orchid\Screens\Deliver\DeliverCreateScreen;
use App\Orchid\Screens\Deliver\DeliverListScreen;
use App\Orchid\Screens\FilesScreen;
use App\Orchid\Screens\PlatformScreen;
use UniSharp\LaravelFilemanager\Lfm;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Orders\OdersListScreen;
use App\Orchid\Screens\Restaurant\RestaurantListScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\Shop\ShopListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/dashboard', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{users}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Edit'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Shops
Route::screen('shops', ShopListScreen::class)
    ->name('shops')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Shops'));
    });

// Shops
Route::screen('restaurants', RestaurantListScreen::class)
    ->name('restaurants')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Restaurants'));
    });
Route::screen('restaurants/create', RestaurantListScreen::class)
    ->name('restaurants.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Restaurants'), route('restaurants.create'));
    });
/* Route::screen('restaurants/create', RestaurantListScreen::class)
    ->name('restaurants.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Restaurants'), route('restaurants.create'));
    }); */
// Orders
Route::screen('orders', OdersListScreen::class)
    ->name('orders')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Orders'));
    });

//delivers
Route::screen('delivers', DeliverListScreen::class)
    ->name('delivers')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Delivers'));
    });


Route::screen('delivers/create', DeliverCreateScreen::class)
    ->name('delivers.create');

Route::screen('delivers/{slug}', DeliverListScreen::class)
    ->name('delivers.details')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('delivers')
            ->push(__('Delivers'));
    });

Route::prefix('filemanager')->middleware('auth')->group(function () {
    Lfm::routes();
});
Route::screen('files', FilesScreen::class)->name('platform.files');
