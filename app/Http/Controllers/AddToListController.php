<?php

namespace App\Http\Controllers;

use App\Models\yourList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Symfony\Component\String\u;

class AddToListController extends Controller {
    public function index(Request $request, $id) {

        if (!auth()->user()) {
            return redirect()->back()->with('error', 'Please login first to add your list.');
        }

        $id = $id;
        $type = $request->query('type');
        $checkExist = yourList::where('user_id', auth()->user()->id)->where('mId', $id)->get();

        if ($type === 'movie') {
            $movie = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $id)->json();

            if (count($checkExist) > 0) {
                return redirect()->back()->with('error', 'Already added to your list.');
            } else {
                $added = yourList::create([
                    'mId' => $id,
                    'user_id' => auth()->user()->id,
                    'type' => $type,
                    'title' => $movie['title'],
                    'poster' => "https://image.tmdb.org/t/p/w500" . $movie['poster_path']
                ]);
                if ($added) {
                    return redirect()->back()->with('success', 'Added to your list successfully.');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong.');
                }
            }
        } else {
            $tv = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/' . $id)->json();

            if (count($checkExist) > 0) {
                return redirect()->back()->with('error', 'Already added to your list.');
            } else {
                $added = yourList::create([
                    'mId' => $id,
                    'user_id' => auth()->user()->id,
                    'type' => $type,
                    'title' => $tv['name'],
                    'poster' => "https://image.tmdb.org/t/p/w500" . $tv['poster_path']
                ]);
                if ($added) {
                    return redirect()->back()->with('success', 'Added to your list successfully.');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong.');
                }
            }
        }
    }
}
