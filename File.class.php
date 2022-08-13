<?php
class File
{

public $folder = "";


public function __construct($folder)
{
    $this->folder = $folder;

}


  // folder
public function folder()
{
  return $this->folder;
}



public function list($folderName = "")
{

  if (isset($folderName)) {
        $scandir = scandir($folderName);
        $scandir = array_slice($scandir,2);
        return $scandir;
  }else {
    $scandir = scandir($this->folder);
    $scandir = array_slice($scandir,2);
    return $scandir;

  }
}

public function deleteFolder($Foldername)
{
  if(is_dir($Foldername)){
    $glob = glob($Foldername . "/*.*");
    if (empty($glob)) {
      rmdir($Foldername);
    }else {
      $glob = glob($Foldername . "/*.*");
      foreach ($glob as $value) {
        unlink($value);
      }
      rmdir($Foldername);
      return true;
    }
  }else {
    return false;
  }
}



public function readFile($fileName){
  if (file_exists($fileName)) {
    $read = file_get_contents($fileName);
    return $read;
  }else{
    return false;
  }
}



public function deleteFile($filename){

  if(file_exists($filename)){
  unlink($filename);
  return true;
  }else {
    return false;
  }
}



  public function createFile($fileName){


    if(!file_exists($fileName)){
      file_put_contents($fileName,"");
      return true;
      }else {
        return false;
      }


  }

  public function editFile($fileName,$text){

    if(file_exists($fileName)){
      file_put_contents($fileName, "\n" . $text,FILE_APPEND);
      return true;
      }else {
        return false;
      }

  }

public function deleteAll($Foldername){
  if(is_dir($Foldername)){
      $glob = glob($Foldername . "/*.*");
      foreach ($glob as $value) {
        unlink($value);
      }
      return true;
    }else {
    return false;
  }
}




public function Upload($htmlFileForm,$to,array $validate){

$name = md5(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789") . time() . "+_)(*&*");

if (is_array($htmlFileForm) && is_array($validate)) {
  if(in_array($htmlFileForm['type'],$validate)){
    
$name2 = substr($htmlFileForm['name'],14);
// return $to;
move_uploaded_file($htmlFileForm['tmp_name'],$to . "/$name.$name2");
  return $to . "/$name.$name2";
  }
}


}
}

 ?>
