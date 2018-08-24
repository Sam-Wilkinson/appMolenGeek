<?php

namespace Modules\SalleReservation\Services;


use Storage;
class imageDelete {

/*
* Deletes old images
* @param $image
* @paral $folder
*/
public function imageDelete($image, $folder){
    Storage::disk($folder)->delete($image);
}
}