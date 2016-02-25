<?php
/*----------------------------------------------------------
            create time 2016-02-23 07:11 PM
-----------------------------------------------------------*/
abstract class MaMoly{
	private static $_instance = array();
    public static function start(){
        $include = array(DEPTH_LIB,
                         DEPTH_DEPLOY,
                         DEPTH_BASIS,
                         DEPTH_EXTEND,
                         APP_PATH.APP_NAME."\\",
                         APP_PATH.APP_NAME."\\Controller\\",
                         APP_PATH.APP_NAME."\\Model\\");         // [加载文件路径设置]
        set_include_path(get_include_path() . PATH_SEPARATOR .implode(PATH_SEPARATOR, $include));
        spl_autoload_register(array("MaMoly","autoload"));
        self::AppModel();
    }
	public static function autoload($class){
        if(substr($class,-6) == "Action"){
            $path = substr($class,-6)."\\".$class."_Class".FILE_EXT;
        }elseif(substr($class, -4) == "Cont"){
            $path = substr($class, -4)."\\".$class."_Class".FILE_EXT;
        }elseif(substr($class, -4) == "Core"){
            $path = substr($class, -4)."\\".$class."_Class".FILE_EXT;
        }elseif(substr($class, -4) == "View"){
            $path = substr($class, -4)."\\".$class."_Class".FILE_EXT;
        }elseif(substr($class, -5) == "Model"){
            $path = substr($class, -5)."\\".$class."_Class".FILE_EXT;
        }else{
            $path = $class."Action_Class".FILE_EXT;
        }
	    AddExtends($path);
	}
	public static function instance( $class , $method = '' ){          // [实例化对象]
        $identify   =   $class.$method;
        if(!isset(self::$_instance[$identify])){
        	if(class_exists($class)){
               $o = new $class();
                if(!empty($method) && method_exists($o,$method))
                    self::$_instance[$identify] = call_user_func_array(array(&$o, $method));
                else
                    self::$_instance[$identify] = $o;
        	}else{
        		echo "2";
        	}
        }
        return self::$_instance[$identify];
	}
    public static function AppModel(){                                // [创建模块文件]
        $model_Floder = array(
            APP_PATH.APP_NAME,
            APP_PATH.APP_NAME."\\Config",
            APP_PATH.APP_NAME."\\Model",
            APP_PATH.APP_NAME."\\Controller",
            APP_PATH.APP_NAME."\\Cache",
            APP_PATH.APP_NAME."\\View",
            APP_PATH.APP_NAME."\\Model\\".$GLOBALS['HandFile']["URL_CONF"]["URL_MODEL_ACTION"],
            FILE_URL_PUBLIC,
        );
        CreateFolder( $model_Floder );
        $model_File = array(
            array(
                APP_PATH.APP_NAME."\\Config\\config".FILE_EXT,
                "<?php \n return array(\n     \"类型配置\" => array(\n             \"配置\" =>  \"参数\"\n   ) \n) \n ?>"
            ),
            array(
                APP_PATH.APP_NAME."\\Controller\\ViewTextAction_Class".FILE_EXT,
                "<?php \n class ViewText extends LyUrlAction{\n  public function index(){\n   show('aaaa');\n  }\n}"
            )
        );
        CreateFile( $model_File );
    }
	public static function display( $templateFile ,$charset , $contentType , $content , $prefix ){    // [显示模块]
        if($templateFile == ''){
        	$theFun = debug_backtrace();
        	print_r($theFun[3]["object"]);
        }
	}
}