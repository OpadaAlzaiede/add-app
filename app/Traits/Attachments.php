<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Attachments
{

    public function storeFileInStorage($file)
    {
        $sampleName = 'uploads';
        $fileName = $sampleName . '-' . date('mdYHis') . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/' . $sampleName, $fileName);

        return str_replace('public/', 'storage/', $path);
    }

    public function deleteFileFromStorage($path)
    {
        $localPath = str_replace('storage/', 'app/public/', $path);

        if (Storage::exists(str_replace('app/public', 'public', $localPath)))
            unlink(storage_path($localPath));
        else
            return false;

    }
}
