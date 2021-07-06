<?php
## Wenn ich nichts tue, gibt es keine Session
## Das hier versucht die Session zu starten und gibt einen Text aus, wenn das nicht klappt!

if (!session_start()) {echo "Sessions nicht möglich";}


?>

