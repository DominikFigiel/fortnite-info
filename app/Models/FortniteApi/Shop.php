<?php

namespace App\Models\FortniteApi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Shop extends Model
{
    public $featured;

    public function __construct()
    {
        $this->featured = $this->getFeatured();
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

    // public function test()
    // {
    //     return collect($this->genres)->mapWithKeys(function ($genre) {
    //         return [$genre['id'] => $genre['name']];
    //     });
    // }

    // private function formatMovies($movies)
    // {
    //     return collect($movies)->map(function($movie) {
    //         $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
    //             return [$value => $this->genres()->get($value)];
    //         })->implode(', ');

    //         return collect($movie)->merge([
    //             'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
    //             'vote_average' => $movie['vote_average'] * 10 .'%',
    //             'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
    //             'genres' => $genresFormatted,
    //         ])->only([
    //             'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
    //         ]);
    //     });
    // }
}
