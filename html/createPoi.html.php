<form method="post" >
    <button name="back" value="0">Back</button><br>
    <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($poi->getId())?>" readonly>
    <input type="hidden" name="idLocation" placeholder="idLocation" value="<?= htmlSpecialChars($poi->getIdLocation())?>" readonly>
    <input type="text" name="poiName" placeholder="poiName" value="<?= htmlSpecialChars($poi->getPoiName())?>" ><br>
    <input type="text" name="attraction" placeholder="attraction" value="<?= htmlSpecialChars($poi->getAttraction())?>" ><br>
    <input type="text" name="intro" placeholder="intro" value="<?=htmlSpecialChars($poi->getIntro())?>" ><br>
    <input type="text" name="infoLink" placeholder="infoLink" value="<?=htmlSpecialChars($poi->getInfoLink())?>" ><br>
    <input type="text" name="poiMap" placeholder="poiMap" value="<?=htmlSpecialChars($poi->getPoiMap())?>" ><br>
    <input type="text" name="notes" placeholder="notes" value="<?=htmlSpecialChars($poi->getNotes())?>" ><br>
    <button name="savePoi" value="1" >Save Poi</button>
    <button name="deletePoi" value="2" >Delete Poi</button>
</form>
<p>
    <?=htmlSpecialChars($message)?>
</p>