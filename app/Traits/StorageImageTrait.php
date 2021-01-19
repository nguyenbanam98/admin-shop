<?php

namespace App\Traits;

use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {

            // $image = $request->$fieldName;

            // $resized_img = Image::make($image);

            // $fileNameOrigin = $image->getClientOriginalName();

            // $resized_img->fit(255, 270)->save($image);

            // $path = $image->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameOrigin);

            // $data = [
            //     'file_name' => $fileNameOrigin,
            //     'file_path' => $url = Storage::url($path),
            // ];

            // return $data;


            $file = $request->$fieldName;

            $fileNameOrigin = $file->getClientOriginalName();

            $fileNameHash = Str::random(20) . '.' . $file->extension();

            $path = $request->file($fieldName)->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);

            $data = [
                'file_name' => $fileNameOrigin,
                'file_path' => $url = Storage::url($path),
            ];

            return $data;

        }

        return null;

    }

    public function storageTraitUploadMutiple($file, $foderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();

        $fileNameHash = Str::random(20) . '.' . $file->extension();

        $filePath = $file->storeAs('public/' . $foderName . '/' . auth()->id(), $fileNameHash);

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath),
        ];
        return $dataUploadTrait;
    }

    public function deleteImage($path)
    {
        $file_path = '.'.$path;             
        // dd($file_path);
        if(file_exists(public_path($file_path))){

            unlink(public_path($file_path));
      
          }
         return null;
    }

}