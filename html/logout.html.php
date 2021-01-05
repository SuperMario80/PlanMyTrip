<?php
//    INPUT INTERFACE
//        $email - EMAIL OF LOGGED IN USER
?>
<header id="showcase">
    <div class="showcase-content">
        <h4>Hello <?=$email?></h4>
        <form method="post">
            <input class="btn" type="submit" name="logout" value="Logout" >
        </form>
    </div>
</header>