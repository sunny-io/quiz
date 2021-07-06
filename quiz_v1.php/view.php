<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Das uncoole Quiz</title>
</head>
<body>
<header>Navi </header>
<div>
    <div><h2><?=$m_sTopic ?></h2></div>
    <div>
    <ol>
    <?php 
    foreach ($m_aAntwortauswahl as $antwort){
        echo "<li>".$antwort."</li>";
    }
    
    ?>
    </ol>
    </div>
    <div>
    <p>Frage Nummer <?= $m_iFrage ?> von <?= $m_iAnzahlFragen ?></p>
    <form action="index.php" method="get">
        <input type="submit" name="prev" value="Zurück">
        <input type="submit" name="next" value="Weiter">
    </form>
    </div>
</div>

<footer>  Impressum </footer>
    
</body>
</html>