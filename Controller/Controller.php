<?php

abstract class Controller{

    public function render($view, $viewBag=array()){
        $file = "View/$view";
        $file = str_replace("Controller","",$file);
        if(is_file($file)){
            extract($viewBag);
            ob_start();
            require($file);
            $content = ob_get_contents();
            ob_end_clean();            
            echo $content;            
        }else{
            echo "No existe esta vista";
        }
    }

   
}
?>