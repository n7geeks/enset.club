<?php


namespace App\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    public function storeImage(UploadedFile $image, string $directoryPath, string $uniqueName = null)
    {
        $filename = $uniqueName ?: time();
        $filename .= '.' . $image->getClientOriginalExtension();
        $filename = $directoryPath . $filename;

        $location = public_path($filename);

        $image = Image::make($image);
        $image->save($location);
        $image->destroy();

        return $filename;
    }

    public function deleteImage($imagePath): void
    {
        File::delete($imagePath);
    }
}
