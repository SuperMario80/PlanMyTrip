<?php
//    TEMPLATE TO CREATE NEW OR UPDATE EXISTING POI
?>

<div class="headersection">
    <h1>EDIT YOUR POINT OF INTEREST</h1>
</div>
<div class="container py-3">

    <div class="greybox">
        <h1 class="m-heading text-center">
            <?=htmlSpecialChars($message)?>
        </h1>
        <form method="post" >

            <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">
                <li>
                    <label for="poiName" class="required">Point Of Interest<span id="required" title="This field is required">*</span></label>
                    <input type="text" name="poiName" placeholder="PointOfInterest" value="<?= htmlSpecialChars($poi->getPoiName())?>" tabindex="1">
                </li>
                <li>
                    <label for="city" class="required">Location Area<span id="required" title="This field is required">*</span>
                    </label>
                    <input type="text" name="city" placeholder="City" value="<?= htmlSpecialChars($poi->getCity())?>"tabindex="3">
                </li>
                <li>
                    <label for="attraction" class="required">Type of Attraction
                    </label>
                    <input type="text" name="attraction" placeholder="POI Type" value="<?= htmlSpecialChars($poi->getAttraction())?>" tabindex="4">
                </li>
                <li>
                    <label for="infoLink" class="optional">Website
                    </label>

                    <input type="text" name="infoLink" placeholder="Info Link" value="<?=htmlSpecialChars($poi->getInfoLink())?>" tabindex="5">
                </li>
                <li>
                    <label for="poiMap" class="optional">Google Maps
                    </label>
                    <input type="text" name="poiMap" placeholder="Google Maps" value="<?=htmlSpecialChars($poi->getPoiMap())?>" tabindex="6">
                </li>
            </ul>
            <ul>
                <li>
                    <label for="intro" class="optional">Introduction
                    </label>
                    <textarea type="text" name="intro" placeholder="Intro" tabindex="7"><?=htmlSpecialChars($poi->getIntro())?>
                    </textarea>
                </li>
                <li>
                    <label for="notes" class="optional">Make your own Notes
                    </label>
                    <textarea name="notes"  placeholder="Notes" tabindex="8"><?=htmlSpecialChars($poi->getNotes())?></textarea>
                </li>
            </ul>
            <button class="btn btn-dark mx-2" name="back" value="0">Back
            </button>
            <button id="saveMyPoi" class="btn btn-dark mx-2" name="savePoi" value="1" >Save
            </button>
            <button id="deleteMyPoi" class="btn btn-dark mx-2" name="deletePoi" value="3" >Delete
            </button>
        </form>
    </div>

</div>