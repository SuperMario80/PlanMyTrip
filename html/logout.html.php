<?php
//    INPUT INTERFACE
//        $email - EMAIL OF LOGGED IN USER
?>
<header id="showcase">
    <section class="showcase-content">
        <h2>Hello <?=$email?></h2>
        <form method="post">
            <input class="btn" type="submit" name="logout" value="Logout" >
        </form>
    </section>
</header>