<?php
/*----------------------------------------------------------
            create time 2016-01-18 03:30 AM
-----------------------------------------------------------*/
define ("TIME_RUN_START" , microtime(true));                        // [运行时间开启]
define ("DEPTH_PATH"     , __DIR__."\\");                           // [内部路径设置]
define ("DEPTH_LIB"      , DEPTH_PATH."Lib\\");                     // [核心文件路径]
define ("DEPTH_FUN"      , DEPTH_PATH."function\\");                // [函数文件路径]
define ("DEPTH_DEPLOY"   , DEPTH_PATH."Deploy\\");                  // [配置文件路径]
define ("DEPTH_BASIS"    , DEPTH_PATH."Basis\\");                   // [基础应用路径]
define ("DEPTH_EXTEND"   , DEPTH_PATH."Extend\\");                  // [扩展文件路径]
define ("FILE_EXT"       , ".php");                                 // [文件后缀设置]
include DEPTH_LIB."AppStart".FILE_EXT;                              // [加载应用文件]