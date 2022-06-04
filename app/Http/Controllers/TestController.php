<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class TestController extends Controller
{
    public function index(): View
    {
        // $fortnite = Http::addHeader('Authorization', '2a27dc60-2bef-4e7b-b73b-a640dea41f8a')->get('https://fortnite-api.com/v2/shop/br');

        // $cosmetics = Http::withHeaders([])
        // ->get('https://fortnite-api.com/v2/cosmetics/br/new?language=pl')
        // ->json()['data']['items'];

        $cosmetics = Http::get('https://fortnite-api.com/v2/cosmetics/br/new', [
            'language' => 'pl'
        ])->json()['data']['items'];

        return view('cosmetics', compact('cosmetics'));
    }
}
