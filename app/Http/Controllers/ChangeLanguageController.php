<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ChangeLanguageController extends Controller
{
    public function changelanguage(Request $request,$locale){
    	App::setLocale($locale);
    	$request->session()->put('locale', $locale);
    	return redirect()->back();
    }

}
