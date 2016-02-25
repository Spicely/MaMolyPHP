<?php
/*----------------------------------------------------------
            create time 2016-02-23 07:11 PM
-----------------------------------------------------------*/
 abstract class LyUrlAction{
   	 public function __construct( $url , $symbol){
   	  	$this->module = explode($symbol, $url);
   	    if( sizeof($this->module) < 5 ){ 
            $this->model_action = $GLOBALS['HandFile']["URL_CONF"]["URL_MODEL_ACTION"];
            $this->model_fun    = $GLOBALS['HandFile']["URL_CONF"]["URL_MODEL_FUN"];
   	    }else{
	   	  	$this->model_action = $this->module[3];
	   	  	$this->model_fun    = $this->module[4];
   	    }
          tag("_TAG_APP_MODEL_",$this->model_fun);
          tag("_TAG_APP_ACTION_",$this->model_action);
          define("FILE_URL_APP_PATH",FILE_URL_APP."\\".$this->model_action);
          $this->view = MaMoly::instance("View");
   	    $this->modelFun($this->model_action,$this->model_fun);
   	  }
   	  private function modelFun( $Action , $function ){
   	  	if( method_exists( $this , $function )){
   	  		$this->$function();
   	  	}else{
   	  		throw new Exception("not is ".$function."", 1);
   	  	}
   	  }
   	  protected function display($templateFile='',$charset='',$contentType='',$content='',$prefix=''){
          $this->view->display($templateFile,$charset,$contentType,$content,$prefix);
   	  }
   }		