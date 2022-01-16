<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Demo extends Controller
{
    public function upload()
    {
         $file_data=File::get($file);
            Storage::cloud()->put($file_name,$file_data);
    }
}
