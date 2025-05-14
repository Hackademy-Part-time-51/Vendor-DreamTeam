<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Cron\CronExpression;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    private $w ,$h, $fileName, $path;
    public function __construct($w, $h, $filePath)
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
        ->crop($w, $h, CropPosition::Center)
        ->save($destPath);

    }
}
