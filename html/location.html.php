<?php
//    TEMPLATE FOR ALL SAVED LOCATIONS
?>
  
  <div>
    <div  class="collapsible" data-expand="<?= htmlSpecialChars($location->getId()) ?>" >
      <div><i class="fas fa-plus fa-xs"> </i></div>
      <div>
          <span class="loc-classification"> <?= htmlSpecialChars($location->getClassification()) ?> </span> 
          <span><?= htmlSpecialChars($location->getLocation()) ?> </span> 
          <span> <?= htmlSpecialChars($location->getCountry()) ?> </span> 
          <span><?= htmlSpecialChars($location->getRegion()) ?> </span>
      </div>
    </div>
  </div>
<div class="expandLoc wrap hidden" id="scrollId-<?= htmlSpecialChars($location->getId()) ?>" data-scrollId="<?= htmlSpecialChars($location->getId()) ?>">


<form method="post">

    <div class="single mb-3" >
        <div class="single-wrap">
            <div class="single-text">
              <div class="single-headline py-0 text-left location">
                <div>
                <h2 class="single-title" >
                
                    <a class="myLocationName" href="<?= htmlSpecialChars($location->getTravelLink()) ?>" target="_blank">
                      <?= htmlSpecialChars($location->getLocation()) ?> <?= htmlSpecialChars($location->getCountry()) ?> 
                      <?= htmlSpecialChars($location->getRegion()) ?>
                    </a>
                  </h2>
                  <div class="button-area">
                    <button class="btn mx-0" name="updateLocation" value="<?= $location->getId()?>" ><span >
                      <i class="fas fa-pen"></i> Edit
                    </span>
                    <button class="btn mx-0" name="newPoi" value="<?= $location->getId() ?>" ><span > <i class="fas fa-plus-circle"> </i> </span >   PointOfInterest</button>
                  </div>
                </div>
              </div>
              <div class="single-desc saved-data">
                <div class="loc-info">
                <?= htmlSpecialChars($location->getIntro()) ?>
                </div>
                <div class="loc-notes">
                  <h5>Your Notes</h5>
                    <p><?= htmlSpecialChars($location->getNotes()) ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    </form>
</div>