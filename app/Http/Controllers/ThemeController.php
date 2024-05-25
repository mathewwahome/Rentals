<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ThemeController extends Controller
{
    //
    public function admintheme()
    {
        $jsonFilePath = public_path('assets/js/theme/theme.json');
        $jsonData = File::exists($jsonFilePath) ? json_decode(file_get_contents($jsonFilePath), true) : [];
        
        return view('dashboard.pages.admin.theme', ['themeData' => $jsonData]);
    }
    public function theme(Request $request)
    {
        $theme = Theme::first();

        if ($theme) {
            $theme->name = $request->name;
            $theme->email = $request->email;
            $theme->phone = $request->phone;
            $theme->location = $request->location;
            $saved = $theme->save();
        } else {
            $theme = new Theme();
            $theme->name = $request->name;
            $theme->email = $request->email;
            $theme->phone = $request->phone;
            $theme->location = $request->location;
            $saved = $theme->save();
        }
        if ($saved) {
            $themeData = [
                'name' => $theme->name,
                'email' => $theme->email,
                'phone' => $theme->phone,
                'location' => $theme->location
            ];
        
            $jsonData = json_encode($themeData);
        
            $filePath = public_path('assets/js/theme/theme.json');
                    file_put_contents($filePath, $jsonData);
        
            return redirect()->back();
        } else {
            // Handle error if the theme couldn't be saved
            return redirect()->back();
        }
    }


   
}
