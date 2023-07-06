<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel {
    public $popularTv, $topRatedTv, $genres;

    public function __construct($popularTv, $topRatedTv, $genres) {
        $this->popularTv = $popularTv;
        $this->topRatedTv = $topRatedTv;
        $this->genres = $genres;
    }

    public function popularTv() {
        return $this->tvFormatted($this->popularTv);
    }

    public function topRatedTv() {
        return $this->tvFormatted($this->topRatedTv);
    }


    public function genres() {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    protected function tvFormatted($movies) {

        return collect($movies)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path' => "https://image.tmdb.org/t/p/w235_and_h235_face" . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . '%',
                'first_air_date' => Carbon::parse($movie['first_air_date'])->format('Y d, m'),
                'genres' => $genresFormatted
            ])->only(['poster_path', 'id', 'genre_ids', 'name', 'vote_average', 'overview', 'first_air_date', 'genres',]);
        });
    }
}
