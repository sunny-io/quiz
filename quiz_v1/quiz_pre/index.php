<?php

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Quiz Startpage</title>
  </head>
  <body>
    <h1>Das coole Quiz</h1>
    <form action="quiz_session.php" method="get">
      <label for="userName">Bitte gibt Deinen Namen ein:</label>
      <input type="text" name="m_tUsername" id="m_tUsername" />
      <input type="submit" value="Quiz starten" />
    </form>
  </body>
</html>
