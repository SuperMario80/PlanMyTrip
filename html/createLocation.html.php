<div class="headersection">
    <h1>CREATE / UPDATE YOUR LOCATION</h1>
</div>
<div class="container py-3">


<div class="greybox">
    <h1 class="m-heading text-center">
        <?=htmlSpecialChars($message)?>
    </h1>
    <form method="post" >
        <input type="hidden" name="id" placeholder="id" value="<?= htmlSpecialChars($location->getId()) ?>" readonly>
        <input type="hidden" name="locationKey" placeholder="locationKey" value="<?= htmlSpecialChars($location->getLocationKey())?>" readonly><br>
        <input type="hidden" name="idTraveller" placeholder="idTraveller" value="<?= htmlSpecialChars($location->getIdTraveller())?>" readonly>
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-2">
            <li>
                <label for="location" class="required">Location Name<span id="required" title="This field is required">*</span></label>
                <input type="text" name="location" placeholder="Location" value="<?= htmlSpecialChars($location->getLocation())?>" tabindex="1">
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
                <label for="classification" class="required">Type of Location<span id="required" title="This field is required">*</span>
                </label>
                <input type="text" name="classification" placeholder="Classification" value="<?= htmlSpecialChars($location->getClassification())?>" tabindex="3">
            </li>
            <li>
                <label for="country" class="required">Country<span id="required" title="This field is required">*</span>
                </label>

                <input type="text" name="country" placeholder="Country" value="<?=htmlSpecialChars($location->getCountry())?>" tabindex="4">
            </li>

            <li>
                <label for="region" class="optional">Region
                </label>

                <input type="text" name="region" placeholder="Region" value="<?=htmlSpecialChars($location->getRegion())?>" tabindex="5">
            </li>
            <li>
                <label for="travelLink" class="optional">Website
                </label>
                <input type="text" name="travelLink" placeholder="Travel Link" value="<?=htmlSpecialChars($location->getTravelLink())?>" tabindex="6">
            </li>
            
        </ul>
        <ul>

            <li>
                <label for="intro" class="optional">Introducing your Location
                </label>
                <textarea type="text" name="intro" placeholder="Intro" tabindex="7"><?=htmlSpecialChars($location->getIntro())?>
                </textarea>
            </li>
    
            <li>
                <label for="notes" class="optional">Make your own Notes
                </label>
                <textarea name="notes"  placeholder="Notes" tabindex="8"><?=htmlSpecialChars($location->getNotes())?></textarea>
            </li>
        </ul>
        <button class="btn btn-dark" name="back" value="0">Back
        </button>
        <button id="saveMyLoc" class="btn btn-dark" name="save" value="1" >Save
        </button>
        <button id="deleteMyLoc" class="btn btn-dark" name="delete" value="2" >Delete
        </button>

    </form>
</div>
</div>