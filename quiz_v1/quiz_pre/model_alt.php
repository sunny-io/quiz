<?php
/*
#############################################################
#
# in dieser Runde anzuzeigende Fragen
# initial= > das gesamte array mit handvoll Fragen
# endfassung => 10 zufällige Fragen aus sql-Datenbank
#
#############################################################

*/

include("./includes/questions.inc.php"); //komplette Fragenauswahl im include

/*
###############################################################
#
# Initialisierung aller später verwendeten Variablen und arrays
#
################################################################
*/

/* Fragen und Antworten */

$m_iFrage = 1; //Nummer der aktuellen Frage für Anzeige/blättern
$m_aAktuelleFrage= $m_aFragen [$m_iFrage -1]; // extrahiert Array der aktuellen Frage; -1 wg Array-counter ab 0;
$m_sTopic =$m_aAktuelleFrage[0]; // extrahiert aktuelle Frage aus Array
$m_iAnzahlFragen = count($m_aFragen); // Anzahl der Fragen in dieser Runde

$m_aAntwortauswahl = array(); // Initialisiert Array für Antwortmöglichkeiten

for ($i = 2; $i< count($m_aAktuelleFrage);$i++) {
$m_aAntwortauswahl [] = $m_aAktuelleFrage[$i];
} // start bei $i=2 wg Arrayaufbau




/* User und Session Management */






/* Antworten und Auswertung */

$m_iEvaluate = 0;

$m_aAntworten = array();

$m_aResultslist = array();


$m_iRichtigeAntworten = 0; //Variable für Anzahl richtiger Antworten

$m_nProzentRichtig = 0.00; //Variable für Prozent richtige Antworten


/* Display Logik Variablen*/
$m_sLogin = "";
$m_sQuestions = "hidden";
$m_sResults = "hidden";

?>