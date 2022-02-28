<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    protected $partner;

    public function __construct(User $partner)
    {
        $this->partner = $partner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $partners = $this->partner->paginate();

        return view('admin.pages.partners.index', compact('partners'));
    }

}
