<?php

#########################################################################################################
#
#Class to generate the actual website output
#needs a number of variables passed to fill out variables inside of view particles => $vars array can store them all
#
#
########################################################################################################

class View {
    var $quiz;
    var $vars = array(); 

/* constructor passes on variables from quiz*/

    function __construct($quiz){
        $this->quiz = $quiz;
    }

/* grabs the mostly html view content, 
* replaces any php-variables by their contents,and buffers als till output 
*/    
   function load ($view){
        ob_start();
        include ($view);
        $output = ob_get_contents();
        ob_get_clean();
        return $output;
    }


}

?>