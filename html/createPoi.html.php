<form method="post" >
    <button class="btn-dark" name="back" value="0">Back</button><br>
    <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($poi->getId())?>" readonly>
    <input type="hidden" name="locationKey" placeholder="locationKey" value="<?= htmlSpecialChars($poi->getLocationKey())?>" readonly><br>
    <input type="hidden" name="idLocation" placeholder="idLocation" value="<?= htmlSpecialChars($poi->getIdLocation())?>" readonly>
    <input type="text" name="poiName" placeholder="PointOfInterest" value="<?= htmlSpecialChars($poi->getPoiName())?>" ><br>
  
    <input type="text" name="city" placeholder="City" value="<?= htmlSpecialChars($poi->getCity())?>" ><br>
    <input type="text" name="attraction" placeholder="POI Type" value="<?= htmlSpecialChars($poi->getAttraction())?>" ><br>
    <input type="text" name="intro" placeholder="Intro" value="<?=htmlSpecialChars($poi->getIntro())?>" ><br>
    <input type="text" name="infoLink" placeholder="Info Link" value="<?=htmlSpecialChars($poi->getInfoLink())?>" ><br>
    <input type="text" name="poiMap" placeholder="Openstreetmap" value="<?=htmlSpecialChars($poi->getPoiMap())?>" ><br>
    <input type="text" name="notes" placeholder="Notes" value="<?=htmlSpecialChars($poi->getNotes())?>" ><br>
    <button class="btn-dark" name="savePoi" value="1" >Save</button>
    <button class="btn-dark" name="deletePoi" value="2" >Delete</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>

