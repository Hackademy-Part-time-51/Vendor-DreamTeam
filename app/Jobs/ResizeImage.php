<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Cron\CronExpression;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\Unit;

// 
class ResizeImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $w ,$h, $fileName, $path;
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath) ;
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }
   

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath= storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}X{$h}_". $this->fileName;

        Image::load($srcPath)
        ->fit(Fit::Crop, $w, $h)
        ->watermark(
            base_path('resources/IMAGES/LOGO-SENZA-SFONDO.png'),
            width:200,
            height:200,
            paddingX:5,
            paddingY:5,
            paddingUnit: Unit::Percent,
            alpha:50
        )
        ->save($destPath);

    }
}
