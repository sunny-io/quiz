
    <div class="content">
 

        <div class="laterVariable">
            <h2><?= $this->vars["topic"] ?></h2>
          
            <form action="<?= SCRIPTNAME ?>?view=quiz" method="post">
           
            <?= showquestion ($this->vars["answers"]); ?>
              
           

            <input type="hidden" name="form" value="quiz">
            <p class="paging">Frage <?= $this->vars["currentpage"] ?> / <?= $this->vars["countquestions"] ?></p>
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
