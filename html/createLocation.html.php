<form method="post" >
    <button class="btn-dark" name="back" value="0">Back</button><br>
    <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($location->getId()) ?>" readonly>
    <input type="hidden" name="locationKey" placeholder="locationKey" value="<?= htmlSpecialChars($location->getLocationKey())?>" readonly><br>
    <input type="hidden" name="idTraveller" placeholder="idTraveller" value="<?= htmlSpecialChars($location->getIdTraveller())?>" readonly>
    <input type="text" name="location" placeholder="Location" value="<?= htmlSpecialChars($location->getLocation())?>" ><br>
    <input type="text" name="classification" placeholder="Classification" value="<?= htmlSpecialChars($location->getClassification())?>" ><br>
    <input type="text" name="country" placeholder="Country" value="<?=htmlSpecialChars($location->getCountry())?>" ><br>
    <input type="text" name="region" placeholder="Region" value="<?=htmlSpecialChars($location->getRegion())?>" ><br>
    <input type="text" name="intro" placeholder="Intro" value="<?=htmlSpecialChars($location->getIntro())?>" ><br>
    <input type="text" name="travelLink" placeholder="Travel Link" value="<?=htmlSpecialChars($location->getTravelLink())?>" ><br>
    <input type="text" name="notes" placeholder="Notes" value="<?=htmlSpecialChars($location->getNotes())?>" ><br>
    <button id="saveMyLoc" class="btn-dark" name="save" value="1" >Save</button>
    <button class="btn-dark" name="delete" value="2" >Delete</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>



