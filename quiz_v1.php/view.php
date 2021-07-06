<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Das uncoole Quiz</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php if (!session_start()) {echo "Sessions nicht möglich";} ?>
    <header>
        <div class="logo"></div>
        <nav>Navigation</nav>
    </header>
    <div class="content">
        <div class="<?=$m_sLogin?>">
            <form action="index.php" method="get">
            <label for="username">Bitte gibt Deinen Namen ein:</label>
            <input type="text" name="username" id="username">
            <input type="submit" value="Quiz starten">

            </form>
        </div>
        <div class="<?=$m_sQuestions ?>">
            <h2><?= $m_sTopic ?></h2>
       
            <ol>
            <?php  echo (showquestion ($m_aAntwortauswahl)); ?>
              
            </ol>
       
            <p>Frage Nummer <?= $m_iFrage ?> von <?= $m_iAnzahlFragen ?></p>
            <form action="index.php" method="get">
                <input type="submit" name="prev" value="Zurück">
                <input type="submit" name="next" value="Weiter">
            </form>
        </div>
        <div class="<?=$m_sResults ?>">
            <h2> Auswertung </h2>
            <ol>
                <?php  echo (showresults ($m_aResultslist)); ?>
            </ol>
            
        </div>

    </div>
<div class="helpline">
<code>Session: $_SESSION = <?php print_r($_SESSION); ?></code>
</div>
    <footer>
        <ul>
            <li> <a href="#">Impressum</a> </li> 
            <li><a href="#">Datenschutz</a> </li>
            <li>created 2021 by <a href="mailto:sunny-io@quantentunnel.de">sunny-io</a></li> 
        </ul></footer>
    
</body>
</html>