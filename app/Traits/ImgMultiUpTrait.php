<?php
namespace App\Traits;


Trait ImgMultiUpTrait{

    public function SaveImage($photo,$folder){
        $photos_count = count($photo);
        for($i=0;$i<$photos_count;$i++){
        $fileName = time().rand(0,100000).$i.'.'.$photo[$i]->extension();
        $photo[$i]->move(public_path($folder), $fileName);
        $imagesNames[] = $fileName;
        }
        $imagesField = implode(',',$imagesNames);
        return $imagesField;
    }
}

?>