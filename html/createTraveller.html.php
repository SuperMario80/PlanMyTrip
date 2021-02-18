<!-- </div> -->
<div class="container">
    <form method="post" >
        
        <div class="greybox my-4 ">
            <p class="m-heading text-center my-1">
        <?=htmlSpecialChars($message)?>
    </p>
            <button class="btn btn-dark" name="back" value="0">Back</button>

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
            <button class="btn btn-dark" name="save" value="1" >Save</button>

        </div>
        <!-- <button class="btn btn-dark" name="delete" value="2" >Delete without Confirmation</button> -->
    </form>
    


 <!-- <input type="text" name="id" placeholder="Id" value="<htmlSpecialChars$traveller->getId" readonly><br> -->