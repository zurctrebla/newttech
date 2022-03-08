<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ACL\{
    PermissionController,
    PermissionRoleController,
    RoleController
};
use App\Http\Controllers\Admin\{
    ClientController,
    DashboardController,
    GameController,
    LocatorController,
    PartnerController,
    SettingController,
    UserController
};

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/admin/settings', [SettingController::class, 'index']);

    /**
     * Users
     */
    Route::any('/admin/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

    /**
     * Permissions
     */
    Route::any('/admin/permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
    Route::get('/admin/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::put('/admin/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('/admin/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::delete('/admin/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/admin/permissions/{id}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::post('/admin/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/admin/permissions', [PermissionController::class, 'index'])->name('permissions.index');

    /**
     * Roles
     */
    Route::any('/admin/roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/admin/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/admin/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::post('/admin/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index');

    /**
     * Permission x Role
     */
    Route::get('/admin/roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');   /**ok */
    Route::post('/admin/roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');                      /**ok */
    Route::any('/admin/roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');             /**ok */

    // Route::put('/admin/roles/{id}/permissions/{id}', [PermissionRoleController::class, 'update'])->name('permissions.update');
    // Route::get('/admin/roles/{id}/permissions/edit/{id}', [PermissionRoleController::class, 'edit'])->name('permissions.edit');
    // Route::delete('/admin/roles/{id}/permissions/{id}', [PermissionRoleController::class, 'destroy'])->name('permissions.destroy');
    // Route::get('/admin/roles/{id}/permissions/{id}', [PermissionRoleController::class, 'show'])->name('permissions.show');
    Route::get('/admin/roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
    // Route::get('/admin/roles/{id}/permissions', [PermissionRoleController::class, 'index'])->name('permissions.index');

    /**
     * Games
     */
    Route::any('/admin/games/search', [GameController::class, 'search'])->name('games.search');
    Route::get('/admin/games/create', [GameController::class, 'create'])->name('games.create');
    Route::put('/admin/games/{id}', [GameController::class, 'update'])->name('games.update');
    Route::get('/admin/games/edit/{id}', [GameController::class, 'edit'])->name('games.edit');
    Route::delete('/admin/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
    Route::get('/admin/games/{id}', [GameController::class, 'show'])->name('games.show');
    Route::post('/admin/games', [GameController::class, 'store'])->name('games.store');
    Route::get('/admin/games', [GameController::class, 'index'])->name('games.index');

    /**
     * Partners
     */
    Route::any('/admin/partners/search', [PartnerController::class, 'search'])->name('partners.search');
    Route::get('/admin/partners/create', [PartnerController::class, 'create'])->name('partners.create');
    Route::put('/admin/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');
    Route::get('/admin/partners/edit/{id}', [PartnerController::class, 'edit'])->name('partners.edit');
    Route::delete('/admin/partners/{id}', [PartnerController::class, 'destroy'])->name('partners.destroy');
    Route::get('/admin/partners/{id}', [PartnerController::class, 'show'])->name('partners.show');
    Route::post('/admin/partners', [PartnerController::class, 'store'])->name('partners.store');
    Route::get('/admin/partners', [PartnerController::class, 'index'])->name('partners.index');

    /**
     * Clients
     */
    Route::any('/admin/clients/search', [ClientController::class, 'search'])->name('clients.search');
    Route::get('/admin/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::put('/admin/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::get('/admin/clients/edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
    Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/admin/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::post('/admin/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/admin/clients', [ClientController::class, 'index'])->name('clients.index');

    /**
     * Locators
     */
    Route::get('/admin/locators/qrcode/{uuid}', [LocatorController::class, 'qrcode'])->name('locators.qrcode');
    Route::any('/admin/locators/search', [LocatorController::class, 'search'])->name('locators.search');
    Route::get('/admin/locators/create', [LocatorController::class, 'create'])->name('locators.create');
    Route::put('/admin/locators/{id}', [LocatorController::class, 'update'])->name('locators.update');
    Route::get('/admin/locators/edit/{id}', [LocatorController::class, 'edit'])->name('locators.edit');
    Route::delete('/admin/locators/{id}', [LocatorController::class, 'destroy'])->name('locators.destroy');
    Route::get('/admin/locators/{id}', [LocatorController::class, 'show'])->name('locators.show');
    Route::post('/admin/locators', [LocatorController::class, 'store'])->name('locators.store');
    Route::get('/admin/locators', [LocatorController::class, 'index'])->name('locators.index');

});

Route::get('test-acl', function () {
    // dd(auth()->user()->permissions());
    // dd('teste');
    return view('admin.pages.locators.payment');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
