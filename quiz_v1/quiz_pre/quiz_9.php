<?php include("includes/pagestart.inc.php"); ?>

<?php
### DATEN START
    include("includes/daten.inc.php");

    if (isset($_GET["username"]))
        $_SESSION["username"] = $_GET["username"];

    if (!isset($_GET["username"]) && !isset($_SESSION["username"]))
        header("Location: index.php");

    if (!isset($_SESSION["aktuelle_seite"]) || isset($_GET["start"]))
        $_SESSION["aktuelle_seite"] = 1;

    if (isset($_GET["start"]))
        for ($i = 0; $i < count($m_aAufgaben); $i++) {
            if (isset($_SESSION["s".($i + 1)]))
                $_SESSION["s".($i + 1)] = "";
        }

    if (isset($_GET["prev"]) || isset($_GET["next"]) || isset($_GET["result"])) {
        if (isset($_GET["answer"]))
            $_SESSION["s".$_SESSION["aktuelle_seite"]] = $_GET["answer"];
    }        

    if (isset($_GET["prev"]) && $_SESSION["aktuelle_seite"] > 1)
        $_SESSION["aktuelle_seite"]--;

    if (isset($_GET["next"]) && $_SESSION["aktuelle_seite"] < count($m_aAufgaben))
        $_SESSION["aktuelle_seite"]++;

    $m_sUsername = $_SESSION["username"];
    $m_iaPage = $_SESSION["aktuelle_seite"];
    $m_iRichtig = 0;
    $m_iGesamt = 1;
    $m_fProzent = 0.00;

    $m_bResult = false;
    if (isset($_GET["result"]))
        $m_bResult = true;

    $m_sAnswer = "";
    if (isset($_SESSION["s".$_SESSION["aktuelle_seite"]]))
        $m_sAnswer = $_SESSION["s".$_SESSION["aktuelle_seite"]];
    
### DATEN ENDE
?>



<?php
### VERARBEITUNG START
    $m_iGesamt = count($m_aAufgaben);
    echo($m_iGesamt);

    for ($i = 0; $i < count($m_aAufgaben); $i++) {
        if ($m_aAufgaben[$i][1] == $_SESSION["s".($i + 1)]) {
            $m_iRichtig++;
        }
    }

    $m_fProzent = round($m_iRichtig/$m_iGesamt, 2)*100;
### VERARBEITUNG ENDE
?>



<?php
### AUSGABE START
?>
<h1>Das Quiz</h1>    
<h3>Hallo <?= $m_sUsername ?>!</h3>
<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="get">
<?php

if ($m_bResult) {

?>
<h4>Hier ist Dein Ergebnis: <?= $m_iRichtig ?> von <?= $m_iGesamt ?> (<?= $m_fProzent ?>%) richtig</h4>
<p><input type="submit" name="start" value="Nochmal"></p>
<?php

    for ($i = 0; $i < count($m_aAufgaben); $i++) {
        if ($m_aAufgaben[$i][1] == $_SESSION["s".($i + 1)])
            $r = "richtig";
        else
            $r = "falsch";
        echo "<p>Aufgabe ".($i + 1).": ".$r."</p>";
    }
} else {

?>
<h4>Hier sind Deine Fragen:</h4>
<p><input type="submit" name="prev" value="Zurück">&nbsp;<input type="submit" name="next" value="Weiter"></p>
<?php

$i = $m_iaPage - 1;

echo "<div>";
echo "<p>Aufgabe ".$m_iaPage."</p>";
echo "<p>".$m_aAufgaben[$i][0]."</p>";
echo "<ol>";
for ($j = 2; $j < count($m_aAufgaben[$i]); $j++) {
    echo "<li>".$m_aAufgaben[$i][$j]."</li>";
}
echo "</ol>";
echo "<p>L&ouml;sung:&nbsp;<input type='text' size='3' name='answer' value='".$m_sAnswer."'></p>";
echo "</div>";

?>
<p><input type="submit" name="result" value="Abgabe"></p>
<?php

}

?>
</form>
<?php
### AUSGABE ENDE
?>

<?php include("includes/pageend.inc.php"); ?>