<?php

namespace App\Http\Controllers\FortniteApi;

use App\Http\Controllers\Controller;
use App\Models\FortniteApi\Shop;
use Illuminate\View\View;

class ShopController extends Controller
{
    public Shop $shop;

    public function __construct()
    {
        $this->shop = new Shop;
    }

    public function index(): View
    {
        $featured = $this->shop->featured;

        return view('fortnite_api.index', compact('featured'));
    }

}
