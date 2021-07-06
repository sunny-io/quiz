<?php
/* 
#########################################################################
# 
# Array für die Fragen in dieser Runde
# 0=> Frage, 1 => Position der korrekten Antwort ab hier => ([korrekte Antwort]- [1]), 
# [n+ Antwortmöglichkeiten]
# Array unterstützt Abgleich Richtige/Falsche Antworten per Positionsnummer (Multiple-Choice)
#
###########################################################################
*/

$m_aFragen = array(
    array("Wieviel sind 1+2?", 3,           7, 5, 3),
    array("Welche Farbe hat eine Zitrone?", 1, "gelb", "blau", "rot", "braun", "schwarz"),
    array("Wieviel sind 2*3?", 2,           7, 6, 1, 5, 9),
    array("In der Nacht ist es ...", 2, "hell", "dunkel"),
);

?>