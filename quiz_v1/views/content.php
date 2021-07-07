
    <div class="content">
     <!--   <div class="<?=$m_sLogin?>">
            <form action="index.php" method="get">
            <label for="username">Bitte gibt Deinen Namen ein:</label>
            <input type="text" name="username" id="username">
            <input type="submit" value="Quiz starten">

            </form>
        </div> -->

        <div class="laterVariable">
            <h2><?= $this->vars["topic"] ?></h2>
       
            <ol>
            <?= showquestion ($this->vars["answers"]); ?>
              
            </ol>
       
            <p>Frage Nummer <?= $this->vars["currentpage"] ?> von <?= $this->vars["countquestions"] ?></p>
            <form action="index.php" method="get">
                <input type="submit" name="prev" value="Zurück">
                <input type="submit" name="next" value="Weiter">
            </form>
        </div>

        <!--
        <div class="<?=$m_sResults ?>">
            <h2> Auswertung </h2>
            <ol>
                <?php  echo (showresults ($m_aResultslist)); ?>
            </ol>
            
        </div>
-->
    </div>
