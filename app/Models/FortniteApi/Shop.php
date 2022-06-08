<?php

namespace App\Models\FortniteApi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Shop extends Model
{
    public $featured;
    public $daily;
    public $specialFeatured;

    public function __construct()
    {
        $this->featured = $this->getFeatured();
        $this->daily = $this->getDaily();
        $this->specialFeatured = $this->getSpecialFeatured();
    }

    public function getFeatured()
    {
        $featured = Http::get('https://fortnite-api.com/v2/shop/br?language=pl')->json()['data']['featured']['entries'];

        $featuredCollection = collect($featured);

        $featuredItems = $featuredCollection->map(function ($featuredCollection) {
            return collect($featuredCollection)
                ->only(['regularPrice', 'finalPrice', 'bundle', 'banner', 'items']);
        });

        return $featuredItems;
    }

    public function getDaily()
    {
        $daily = Http::get('https://fortnite-api.com/v2/shop/br?language=pl')->json()['data']['daily']['entries'];

        $dailyCollection = collect($daily);

        $dailyItems = $dailyCollection->map(function ($dailyCollection) {
            return collect($dailyCollection)
                ->only(['regularPrice', 'finalPrice', 'bundle', 'banner', 'items']);
        });

        return $dailyItems;
    }

    public function getSpecialFeatured()
    {
        $featured = Http::get('https://fortnite-api.com/v2/shop/br?language=pl')->json()['data']['specialFeatured']['entries'];

        $featuredCollection = collect($featured);

        $featuredItems = $featuredCollection->map(function ($featuredCollection) {
            return collect($featuredCollection)
                ->only(['regularPrice', 'finalPrice', 'bundle', 'banner', 'items']);
        });

        return $featuredItems;
    }
}
