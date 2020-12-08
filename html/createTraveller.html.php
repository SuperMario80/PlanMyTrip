<form method="post" >
    <button name="back" value="0">Back</button><br>
    
    <input type="text" name="firstName" placeholder="first name" value="<?= htmlSpecialChars($traveller->getFirstName())?>" ><br>
    <input type="text" name="lastName" placeholder="last name" value="<?= htmlSpecialChars($traveller->getLastName())?>" ><br>
    <input type="text" name="email" placeholder="e-mail" value="<?= htmlSpecialChars($traveller->getEmail())?>" ><br>
    <input type="password" name="password" placeholder="password" value="<?=htmlSpecialChars($traveller->getPassword())?>" ><br>
    <button name="save" value="1" >Save</button>
    <button name="delete" value="2" >Delete without Confirmation</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>


 <!-- <input type="text" name="id" placeholder="Id" value="<htmlSpecialChars$traveller->getId" readonly><br> -->