<div class="background">
      <img
        src="./images/agence-olloweb-Z2ImfOCafFk-unsplash_small.jpg"
        alt="Stifte"
      />
    </div>
    <div class="content">
      <h1>quizname</h1>
 
      <div class="loginForm">
      <!-- debug <?php print(var_dump($this->vars)); ?> -->
        <form action="<?= SCRIPTNAME ?>?view=quiz" method="post">
          <p><label for="userName">Bitte gib Deinen Namen ein: *</label><br>
          <span class="error"> <?= $this->vars["nameErr"]?></span>
<br></p>
          <input type="hidden" name="form" value="login">
          <p><input type="text" name="username" id="username" /></p>
          <p><input type="submit" value="Start Quiz" class="button" /></p>
        </form>
      </div>
    </div>
    <p class="imageReference">
      Stashed image reference: Photo by
      <a
        href="https://unsplash.com/@olloweb?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"
        >Agence Olloweb</a
      >
      on
      <a
        href="https://unsplash.com/?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText"
        >Unsplash</a
      >
    </p>