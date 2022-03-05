<?php
namespace App\Traits;

Trait ImgUpTrait{

    public function SaveImage($photo,$folder){
        $fileName = time().rand(0,100000). '.' .$photo->extension();
        $photo->move(public_path($folder), $fileName);
        return $fileName;
    }
}

?>