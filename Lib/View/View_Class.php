<?php
/*----------------------------------------------------------
            create time 2016-02-23 07:11 PM
-----------------------------------------------------------*/
  class View{
  	public function __construct(){
  		$this->model = MaMoly::instance("Model");
  	}
  	public function display($templateFile='',$charset='',$contentType='',$content='',$prefix=''){
      $temp = ''=== $templateFile ? tag("_TAG_APP_MODEL_") : $templateFile;
      $this->model->replaceModel(APP_PATH.APP_NAME."\\Model\\".tag("_TAG_APP_ACTION_")."\\".$temp.$GLOBALS['HandFile']["VIEW_CONF"]["VIEW_FILE_EXT"]);
  	}
  	/*public function f_each($templateFile='',){

  	}
  	public function header($charset='',$contentType='',$content=''){

  	}*/
  }