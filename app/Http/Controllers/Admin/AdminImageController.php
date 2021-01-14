<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class AdminImageController extends Controller
{
    public function flyResize($size, $imagePath)
    {
        $imageFullPath = public_path($imagePath);

        $sizes = config('image.sizes');

        
        if (!file_exists($imageFullPath) || !isset($sizes[$size])) {
            abort(404);
        }
    
        $savedPath = public_path('resizes/' . $size . '/' . $imagePath);


        $savedDir = dirname($savedPath);

        if (!file_exists($savedDir)) {
            
            mkdir($savedDir, 777, true);
        }
    
        list($width, $height) = $sizes[$size];

    
        $image = Image::make($imageFullPath)->fit($width, $height)->save($savedPath);
    
        return $image;
    }
}
