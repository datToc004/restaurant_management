<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        $language = ($lang == 'vi' || $lang == 'en') ? $lang : config('app.locale');
        Session::put('language', $language);

        return redirect()->back();
    }
}
