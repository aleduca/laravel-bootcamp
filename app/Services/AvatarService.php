<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AvatarService
{
    public function upload(
        UploadedFile $file,
        string $oldAvatar,
        int $size
    ): string {
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($file)->cover($size, $size)->toPng();
        //   2. Gerar novo nome
        $newName = 'avatars/'.uniqid().'.png';
        //   3. Salvar nova imagem
        Storage::disk('public')->put(
            $newName,
            $image
        );

        $this->delete($oldAvatar);

        return $newName;
    }

    protected function delete(string $oldAvatar)
    {
        if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
            Storage::disk('public')->delete($oldAvatar);
        }
    }
}
