<?php

setcookie("test", 0);
if (!isset($_COOKIE["test"])) {
    "Browser verwendet keine Cookies";
}else{
    unset($_COOKIE["test"]);
}

?>