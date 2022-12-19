<?php
function getFolderProyect() {
    if( strpos(__DIR__, '/') !== false ){
        $folder = str_replace('/opt/lampp/htdocs/', '/', __DIR__);
    }else{
        $folder = str_replace('C:\\xampp\\htdocs\\', '/', __DIR__);
    }
    $folder = str_replace('config', '', $folder);
    return $folder;

}

Function saveImage($file){
    $imageName = str_replace(' ', '',$file['Foto']['name']);
    $imgTmp = $file ['Foto']['tmp_name'];

    move_uploaded_file($imgTmp, $_SERVER ['DOCUMENT_ROOT'].getFolderProyect().'/images/'.$imageName);
    return $imageName;
}
?>