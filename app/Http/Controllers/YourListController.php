<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\yourList;
use Illuminate\Http\Request;

class YourListController extends Controller {
    public function index() {
        $user = auth()->user();
        $userList = $user->list()->paginate(5);
        $data = [
            'userList' => $userList
        ];

        return view('yourList', $data);
    }
}
