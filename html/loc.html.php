<form method="post" >
    <button name="back" value="0">Back</button><br>
    <input type="text" name="id" placeholder="id" value="<?= htmlSpecialChars($location->getId()) ?>" readonly><br>
    <input type="text" name="idTraveller" placeholder="idTraveller" value="<?= htmlSpecialChars($location->getIdTraveller())?>" ><br>
    <input type="text" name="location" placeholder="location" value="<?= htmlSpecialChars($location->getLocation())?>" ><br>
    <input type="text" name="classification" placeholder="classification" value="<?= htmlSpecialChars($location->getClassification())?>" ><br>
    <input type="text" name="country" placeholder="country" value="<?=htmlSpecialChars($location->getCountry())?>" ><br>
    <input type="text" name="region" placeholder="region" value="<?=htmlSpecialChars($location->getRegion())?>" ><br>
    <input type="text" name="intro" placeholder="intro" value="<?=htmlSpecialChars($location->getIntro())?>" ><br>
    <input type="text" name="travelLink" placeholder="travelLink" value="<?=htmlSpecialChars($location->getTravelLink())?>" ><br>
    <input type="text" name="notes" placeholder="notes" value="<?=htmlSpecialChars($location->getNotes())?>" ><br>
    <button name="save" value="1" >Save</button>
    <button name="delete" value="2" >Delete without Confirmation</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>