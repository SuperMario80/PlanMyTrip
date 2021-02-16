<!-- <form method="post" >
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
</p> -->


<div class="headersection">
    <div class="row">
        <div class="small-12 columns">
            
            <h1>CREATE / UPDATE YOUR POINT OF INTEREST</h1>
        </div>
    </div>
</div>
<div class="container py-3">


<div class="greybox">
    <form method="post" >
        <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($poi->getId())?>" readonly>
        <input type="hidden" name="locationKey" placeholder="locationKey" value="<?= htmlSpecialChars($poi->getLocationKey())?>" readonly><br>
        <input type="hidden" name="idLocation" placeholder="idLocation" value="<?= htmlSpecialChars($poi->getIdLocation())?>" readonly>
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">
            <li>
                <label for="poiName" class="required">Point Of Interest<span id="required" title="This field is required">*</span></label>
                <input type="text" name="poiName" placeholder="PointOfInterest" value="<?= htmlSpecialChars($poi->getPoiName())?>" tabindex="1">
            </li>
            <!-- <li>
                <label for="property_type" class="required">Property Type<span id="required" title="This field is required">*</span>
                </label>
                <select name="property_type" id="property_type" tabindex="2">
                    <option value="" label="Please choose:">Please choose:</option>
                    <option value="hostel" label="Hostel">Hostel</option>
                    <option value="hotel" label="Hotel">Hotel</option>
                    <option value="guesthouse" label="Bed and Breakfast">Bed and Breakfast</option>
                    <option value="campsite" label="Campsite">Campsite</option>
                    <option value="apartment" label="Apartment">Apartment</option>
                </select>
            </li> -->

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
                <label for="intro" class="optional">Introducing your Point Of Interest
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
        <button class="btn btn-dark" name="back" value="0">Back
        </button>
        <button id="saveMyPoi" class="btn btn-dark" name="savePoi" value="1" >Save
        </button>
        <button id="deleteMyPoi" class="btn btn-dark" name="deletePoi" value="2" >Delete
        </button>

    </form>
    <p class="m-heading text-center">
        <?=htmlSpecialChars($message)?>
    </p>
</div>
</div>