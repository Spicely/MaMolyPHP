<?php
/*----------------------------------------------------------
            create time 2016-02-23 07:11 PM
-----------------------------------------------------------*/
class Model{
  private $fileExt = ".html";                               // [生成文件后缀]
	public function replaceModel( $filename ){
    $this->filename = $filename;
      $find = array("__PUBLIC__","__APP_PATH__");
      $replace = array(FILE_URL_PUBLIC,FILE_URL_APP_PATH);
    $this->Text = file_get_contents($filename);
	  $this->Text = str_replace($find, $replace, $this->Text);
    $this->get_Name();
    $this->ModelPush(APP_PATH.APP_NAME."\\Cache\\".$this->name);
	}
  private function get_Name(){
     $this->name = substr($this->filename,stripos($this->filename,"\\")+1,stripos($this->filename,".") - stripos($this->filename,"\\") -1);
     $this->md5_Name();
  }
  private function md5_Name(){
    $this->name = md5($this->name).$this->fileExt;
  }
	public  function ModelPush($filename , $vdc = true ){                        // [文件生成位置]
     if($vdc){
       WriteFile($filename,$this->Text);
       include $filename;
     }
	}
} 