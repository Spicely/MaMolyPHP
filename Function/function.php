<?php
/*----------------------------------------------------------
            create time 2016-01-18 08:16 AM
-----------------------------------------------------------*/
	function get_ext( $path ){                                      // [获得文件后缀 并返回]
	  return  pathinfo( $path , PATHINFO_EXTENSION );	
	} 
	function WriteFile( $filename , $string = nuLl ){               // [文件创建写入]
		$fileOpen = fopen( $filename , "w" );
		fputs( $fileOpen , $string );
		fclose( $fileOpen );
	}
	function CreateFile( $dataArray ){                              // [创建文件并写入]
		if(!is_array( $dataArray )){
            throw new Exception("dataArray not is [Array]", 1);
		}else{
			for( $e = 0; $e < sizeof($dataArray) ; $e++){
				if(!file_exists( $dataArray[$e][0] )) WriteFile( $dataArray[$e][0] , $dataArray[$e][1]);	
		    }
        }
	}
	function CreateFolder( $path ){								    // [创建文件或者目录]
		$path = is_array($path) ? $path : array($path);
		for($e = 0 ;$e < sizeof($path);$e++){
		   if( !file_exists($path[$e]) ){
			  if( get_ext($path[$e] ) == '' ){
			  	 mkdir( $path[$e] , 0777 );
				}			
			}	
		}
	}
	function AddExtends( $path ){
		$filename = is_array($path) ? $path : array($path);
		for($e = 0 ; $e < sizeof($filename ) ; $e++) include_once($filename[$e]);
	}
	function tag( $var ,$value="" ){
		if( "" === $value ){
			return $GLOBALS["Tag"][$var];
		}else{
          $GLOBALS["Tag"][$var] = $value;
		}
	}