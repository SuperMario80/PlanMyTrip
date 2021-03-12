<?php
//    TEMPLATE LOGIN
?>
</div>
<div class="loginBox">
    <p class="text-center">
        <?=$message?>
    </p>
    <form method="post">
        <ul>
            <li>
                <input type="text" name="email" placeholder="Email" value="<?=$email?>" >
            </li>
            <li>
                <input type="password" name="password" placeholder="Password" value="<?=$password?>">
            </li>
            <li>
                <input class="btn" type="submit" name="login" value="Login" >
            </li>
            <li>
                <input class="btn" type="submit" name="register" value="Register" >
            </li>
        </ul>
    </form>
</div>