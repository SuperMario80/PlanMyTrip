<form method="post" >
    <button class="btn-dark" name="back" value="0">Back</button><br>
    <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($location->getId()) ?>" readonly>
    <input type="hidden" name="locationKey" placeholder="locationKey" value="<?= htmlSpecialChars($location->getLocationKey())?>" readonly><br>
    <input type="hidden" name="idTraveller" placeholder="idTraveller" value="<?= htmlSpecialChars($location->getIdTraveller())?>" readonly>
    <input type="text" name="location" placeholder="Location" value="<?= htmlSpecialChars($location->getLocation())?>" ><br>
    <input type="text" name="classification" placeholder="Classification" value="<?= htmlSpecialChars($location->getClassification())?>" ><br>
    <input type="text" name="country" placeholder="Country" value="<?=htmlSpecialChars($location->getCountry())?>" ><br>
    <input type="text" name="region" placeholder="Region" value="<?=htmlSpecialChars($location->getRegion())?>" ><br>
<<<<<<< HEAD
    <textarea type="text" name="intro" cols="25" rows="5" placeholder="Intro"><?=htmlSpecialChars($location->getIntro())?></textarea><br>
    <input type="text" name="travelLink" placeholder="Travel Link" value="<?=htmlSpecialChars($location->getTravelLink())?>" ><br>
    <textarea name="notes" cols="25" rows="5" placeholder="Notes" ><?=htmlSpecialChars($location->getNotes())?></textarea><br>
=======
    <textarea type="text" name="intro" placeholder="Intro" value="<?=htmlSpecialChars($location->getIntro())?>" ></textarea><br>
    <input type="text" name="travelLink" placeholder="Travel Link" value="<?=htmlSpecialChars($location->getTravelLink())?>" ><br>
    <textarea type="text" name="notes" placeholder="Notes" value="<?=htmlSpecialChars($location->getNotes())?>" ></textarea><br>
>>>>>>> 3e1b3a4453fe24b454ea4d5e07f8f6ee322a3eec
    <button id="saveMyLoc" class="btn-dark" name="save" value="1" >Save</button>
    <button class="btn-dark" name="delete" value="2" >Delete</button>
    
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>



