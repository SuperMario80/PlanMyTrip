

<div class="content notification is-secondary">
<h3 class="content media-content ">Location</h3>
<form method="post">
    
<div class="notification is-primary">
            <div class="">Location#<?= $location->getId() ?> |  Traveller #<?= $location->getIdTraveller() ?> | 
                <a href="<?= htmlSpecialChars($location->getTravelLink()) ?>" target="_blank"> <?= htmlSpecialChars($location->getLocation()) ?> |  </a>   
              |  <?= htmlSpecialChars($location->getClassification()) ?>  |  <?= htmlSpecialChars($location->getCountry()) ?>   |  <?= htmlSpecialChars($location->getRegion()) ?> 
              </div>
            
            <div class="">INTRO:  <?= htmlSpecialChars($location->getIntro()) ?></div>
            <div class="content">Notes:  <?= htmlSpecialChars($location->getNotes()) ?></div>
          </div>
    <button class="btn btn-dark" name="newLocation" >new Location</button>
    <button class="btn btn-dark" name="updateLocation" value="<?= $location->getId()?>" >update Location</button>
    <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
       
   
</form>
</div>