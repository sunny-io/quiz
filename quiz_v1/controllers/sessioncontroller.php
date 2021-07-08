<?php

class Session {

   public static function init() {
       session_start(); //if already existst, it is used


   }

   public static function assign($k, $v) //creates new key-value pair
   {
    if (!isset($_SESSION[$k])){
        $_SESSION[$k] = $v;
        return true;
   }else {
        return false; 
    }

   }

   public static function set_array($k, $j, $v) //creates new array $k mit key= $j und value= $v;
   {
    if (isset($_SESSION[$k][$j])){
        $_SESSION[$k][$j] = $v;
        return true;
   }else {
        return false; 
    }

   }

   public static function assign_array($k, $j, $v) //creates new array $k mit key= $j und value= $v;
   {
    if (!isset($_SESSION[$k][$j])){
        $_SESSION[$k][$j] = $v;
        return true;
   }else {
        return false; 
    }

   }

   
   public static function set($k, $v) //sets existing var
   {
        if (isset($_SESSION[$k])){
            $_SESSION[$k] = $v;
            return true;
        }else {
            return false; 
        }

   

   }

   public static function dumpsession(){
     print_r($_SESSION);
    } 


    public static function get($k){
        
        return $_SESSION[$k];
    }

    public static function delete ($k){
        unset ($_SESSION[$k]);
    }

    public static function deleteall (){
       $_SESSION = array(); //new empty array
    }

    public static function destroy (){
        self::deleteall();  //self:: bezeichnet die Klasse, aus der die Funktion aufgerufen wird
        session_destroy();
     }
 






}



?>