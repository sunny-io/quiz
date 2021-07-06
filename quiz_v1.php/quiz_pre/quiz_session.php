<?php
### DATEN START

include("includes/daten.inc.php");

// $_GET
$m_iRichtig = 0;
$m_iGesamt = 1;
$m_fProzent = 0.00;
$m_aEingabe = array();
for ($i = 0; $i < count($m_aAufgaben); $i++) {
    $m_aEingabe[] = isset($_GET[$i]) ? $_GET[$i] : null;
}

if ($_GET['m_tUsername']) $m_tUsername = $_GET['m_tUsername'];
if ($m_aEingabe[0] === null) $h_class = "hidden";


### DATEN ENDE




### VERARBEITUNG START
$m_iGesamt = count($m_aAufgaben);

for ($i = 0; $i < count($m_aAufgaben); $i++) {
    if ($m_aAufgaben[$i][1] == $m_aEingabe[$i]) {
        $m_iRichtig++;
    }
}

$m_fProzent = round($m_iRichtig / $m_iGesamt, 2) * 100;
### VERARBEITUNG ENDE




### AUSGABE START

// <input type="hidden"

?>
<!DOCTYPE html>

<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Das Quiz</title>
</head>

<body>


    <h1>Hier ist Dein Quiz <?= $m_tUsername ?>:</h1>
    <p class="<?= $h_class ?>">
        Ergebnis: <?= $m_iRichtig ?> von <?= $m_iGesamt ?> (<?= $m_fProzent ?>% richtig)
    </p>
    <form action="quiz.php" method="get">
        <?php
        for ($i = 0; $i < count($m_aAufgaben); $i++) {
            echo "<div>";
            echo "<p>" . $m_aAufgaben[$i][0] . "<br/>Nummer der L&ouml;sung:&nbsp;<input type='text' size='3' name='" . $i . "'></p>";
            for ($j = 2; $j < count($m_aAufgaben[$i]); $j++) {
                echo "" . ($j - 1) . ".) " . $m_aAufgaben[$i][$j] . "<br/>";
            }
            echo "</div>";
        }
        ?>

        <input type="hidden" id="m_tUsername" name="m_tUsername" value="<?= $m_tUsername ?>">
        <p><input type="submit" value="Übertragen"></p>
        <p><input type="reset" value="Zurücksetzen"></p>
    </form>

</body>

</html>
<?php
### AUSGABE ENDE
?>