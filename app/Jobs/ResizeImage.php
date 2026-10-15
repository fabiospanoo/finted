<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\ImageDriver;
use Spatie\Image\Enums\Unit;


class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $w, $h, $path, $filename;
    public function __construct($w, $h, $path, $filename)
    {
        $this->w = $w;
        $this->h = $h;
        $this->path = $path;
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path('app/public/' . $this->path . '/' . $this->filename);
        $destPath = storage_path('app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->filename);

        Image::useImageDriver(ImageDriver::Gd)->load($srcPath)
            ->crop($w, $h, CropPosition::Center)
            ->watermark(base_path('resources/images/watermark.png'),
            paddingX: 10, 
            paddingY: 10, 
            width: 50,
            height: 50,
            paddingUnit: Unit::Percent
            )
            ->save($destPath);
     }  
            
}