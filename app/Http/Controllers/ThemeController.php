<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function theme(Request $request)
    {
        $theme = new Theme();
        $theme->name = $request->name;
        $theme->email = $request->email;
        $theme->phone = $request->phone;
        $theme->location = $request->location;
        $theme->save();
    }
}
