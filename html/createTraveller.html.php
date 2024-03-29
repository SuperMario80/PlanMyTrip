<?php
//    TEMPLATE TO CREATE NEW OR UPDATE EXISTING TRAVELLER
?>

<div class="headersection">
    <h1><?=htmlSpecialChars($headline)?></h1>
</div>

<div class="container">

    <form method="post" >
        
        <div class="greybox my-4 ">
            <p class="m-heading text-center my-1">
        <?=htmlSpecialChars($message)?>
            </p>
            <button class="btn btn-dark mx-1" name="back" value="0">Back</button>

         <ul >
            <li>
                <label for="classification" class="required">First Name<span id="required" title="This field is required">*</span>
                </label>

                <input type="text" name="firstName" placeholder="first name" value="<?= htmlSpecialChars($traveller->getFirstName())?>" >
            </li>
            <li>
                <label for="classification" class="required">Last Name<span id="required" title="This field is required">*</span>
                </label>
                <input type="text" name="lastName" placeholder="last name" value="<?= htmlSpecialChars($traveller->getLastName())?>" >
            </li>
            <li>
                <label for="classification" class="required">Email<span id="required" title="This field is required">*</span>
                </label>
                <input type="text" name="email" placeholder="e-mail" value="<?= htmlSpecialChars($traveller->getEmail())?>" >
            </li>
            <li>
                <label for="classification" class="required">Password<span id="required" title="This field is required">*</span>
                </label>
                <input type="password" name="password" placeholder="password" value="<?=htmlSpecialChars($traveller->getPassword())?>" >
            </li>
        </ul>
            <button class="btn btn-dark mx-1" name="save" value="1" >Save</button>

        </div>
    </form>