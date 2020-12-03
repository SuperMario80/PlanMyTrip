<!--
    Eingangs-Schnittstelle
        $username - den Namen des anzumeldenden Benutzers als Text 
        $message  - Feddback des Programm, ob erfolgreich angemeldet
    Ausgangs-Schnittstelle
        username
        password
        login
-->
<form method="post">
    <input type="text" name="email" placeholder="Username / Email" value="<?=$email?>" ><br>
    <input type="password" name="password" placeholder="Password" value="<?=$password?>"><br>
    <input type="submit" name="login" value="Login" >
    <input type="submit" name="register" value="Register" >
</form>
<p>
    <?=$message?>
</p>