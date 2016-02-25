<?php
/*--------------------------------------------------------------
            create time 2016-02-14 08:23 AM
--------------------------------------------------------------*/
$File_Path = substr(DEPTH_PATH,0,strlen(DEPTH_PATH)-10);              // [文件默认地址]
defined ("APP_NAME") or define ("APP_NAME" , "MaMoly_Demo");          // [应用模块目录名]
defined ("APP_PATH") or define ("APP_PATH" , $File_Path);             // [应用模块路径]
define  ("HTTP_URL_SELF" , $_SERVER['PHP_SELF']);                     // [定义当前URL]
define  ("FILE_URL_PUBLIC",substr(DEPTH_PATH,0,sizeof(DEPTH_PATH)-11)."__PUBLC__");//[公共文件路径]
define  ("FILE_URL_APP", APP_NAME."\\Model");