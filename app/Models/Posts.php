<?php namespace App\Models;

use Illuminate\Support\Facades\File;


class Posts 
{

    public static function all() 
    {

        $files=File::files(resource_path("posts"));

        return array_map(fn($file)=> $file->getContents() ,$files);

    }

    public static function find($slug)
    {
        // laravel helper functions to get path
        // base_path()
        // resource_path()
        // storage_path()
        // public_path()
        // app_path()
        $path= resource_path("posts/{$slug}.html");

        if(!file_exists($path)){
            abort(404);
        }

      return cache()->remember("posts.{$slug}",now()->addMinutes(5),fn()=> file_get_contents($path));

    }
}