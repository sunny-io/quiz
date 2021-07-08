<?php

#########################################################################################################
#
#Class to generate the actual website output
#needs a number of variables passed to fill out variables inside of view particles => $vars array can store them all
#
#
########################################################################################################

class View {
   // var $quiz;
    var $vars = array(); 
   private $viewpath;

   function setPath($p) {
    $this->viewpath = $p;
   }

   function getPath (){
    return $this->viewpath;
   }

/* grabs the mostly html view content, 
* replaces any php-variables by their contents,and buffers als till output 
*/    
   function load (){
        ob_start();
        include ($this->viewpath);
        $output = ob_get_contents();
        ob_get_clean();
        return $output;
    }


}

?>