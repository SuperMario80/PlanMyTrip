<div class="container">
<form method="post" >
    <button class="btn btn-dark" name="back" value="0">Back</button><br>
    
    <input type="text" name="firstName" placeholder="first name" value="<?= htmlSpecialChars($traveller->getFirstName())?>" ><br>
    <input type="text" name="lastName" placeholder="last name" value="<?= htmlSpecialChars($traveller->getLastName())?>" ><br>
    <input type="text" name="email" placeholder="e-mail" value="<?= htmlSpecialChars($traveller->getEmail())?>" ><br>
    <input type="password" name="password" placeholder="password" value="<?=htmlSpecialChars($traveller->getPassword())?>" ><br>
    <button class="btn btn-dark" name="save" value="1" >Save</button>
    <button class="btn btn-dark" name="delete" value="2" >Delete without Confirmation</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>


 <!-- <input type="text" name="id" placeholder="Id" value="<htmlSpecialChars$traveller->getId" readonly><br> -->