<?php

namespace App\Http\Controllers\UserSearch;

use App\Http\Controllers\Controller;

class UserSearchPageController extends Controller
{
    public function __invoke() {
        return view('user_search.index');
    }
}
