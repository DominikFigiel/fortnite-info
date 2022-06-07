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

        // dd($featuredItems);

        return $featuredItems;
    }

    public function getDaily()
    {
        $featured = Http::get('https://fortnite-api.com/v2/shop/br?language=pl')->json()['data']['daily']['entries'];

        $featuredCollection = collect($featured);

        $featuredItems = $featuredCollection->map(function ($featuredCollection) {
            return collect($featuredCollection)
                ->only(['regularPrice', 'finalPrice', 'bundle', 'banner', 'items']);
        });

        return $featuredItems;
    }

    public function getSpecialFeatured()
    {
        $featured = Http::get('https://fortnite-api.com/v2/shop/br?language=pl')->json()['data']['featured']['entries'];

        $featuredCollection = collect($featured);

        $featuredItems = $featuredCollection->map(function ($featuredCollection) {
            return collect($featuredCollection)
                ->only(['regularPrice', 'finalPrice', 'bundle', 'banner', 'items']);
        });

        return $featuredItems;
    }
}
