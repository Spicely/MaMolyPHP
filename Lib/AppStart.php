<?php
/*----------------------------------------------------------
            create time 2016-01-18 07:04 AM
-----------------------------------------------------------*/
require DEPTH_FUN."function".FILE_EXT;                     // [加载函数文件]
require DEPTH_LIB."Core\\MaMoly_Class".FILE_EXT;           // [加载应用文件]
require DEPTH_DEPLOY."conf_define".FILE_EXT;               // [加载配置文件]
$HandFile = include DEPTH_DEPLOY."config".FILE_EXT;        // [默认配置文件]

MaMoly::start();                                           // [开始应用]
$Tag = array(
    "_TAG_APP_MODEL_" => "index",
    "_TAG_APP_ACTION_" => "ViewText"
    );
$ContFun = $HandFile["URL_CONF"]["URL_MODEL_ACTION"];
new $ContFun(HTTP_URL_SELF,$HandFile["URL_CONF"]["URL_TELL_SYMBOL"]);