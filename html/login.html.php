<!--
    INPUT INTERFACE FOR USER LOGIN WITH 
        EMAIL
        PASSWORD
      
-->
        <form method="post">
            <input type="text" name="email" placeholder="Username / Email" value="<?=$email?>" ><br>
            <input type="password" name="password" placeholder="Password" value="<?=$password?>"><br>
            <input class="btn" type="submit" name="login" value="Login" >
            <input class="btn" type="submit" name="register" value="Register" >
        </form>
        <p>
            <?=$message?>
        </p>
    </div>


<!-- </div>
  <header id="showcase">
	<div class="showcase-content">
    </div>
  </header> -->