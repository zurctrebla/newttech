<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Locator,
    Reading,
    User
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::/* where('tenant_id', $tenant->id)-> */count();
        $totalLocators = Locator::count();
        $totalReadings = Reading::count();

        return view('admin.pages.home.index', compact(
            'totalUsers',
            'totalLocators',
            'totalReadings'
        ));
    }
}
