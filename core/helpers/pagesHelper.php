<?php

class PageHelper{
    public static function header($title){
      print '   
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link href="../../resource/css/bootstrap.min.css" rel="stylesheet">
			  <link href="../../resource/css/styles.css" rel="stylesheet">    
              <title>'.$title.' | La Cuponera</title>
          </head>			 
      ';
    }
}    

?>