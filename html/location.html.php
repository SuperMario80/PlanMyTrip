<!-- <div class="container"> -->
<!-- </div> -->

  <div >
    <div  class="collapsible" data-expand="<?= htmlSpecialChars($location->getId()) ?>">
      <div><i class="fas fa-plus"> </i></div>
      <div>
          <span> <?= htmlSpecialChars($location->getClassification()) ?> </span> 
          <span><?= htmlSpecialChars($location->getLocation()) ?> </span> 
          <span> <?= htmlSpecialChars($location->getCountry()) ?> </span> 
          <span><?= htmlSpecialChars($location->getRegion()) ?> </span>
      </div>
    </div>
  </div>
<div class="expandLoc wrap hidden" id="scrollId-<?= htmlSpecialChars($location->getId()) ?>" data-scrollId="<?= htmlSpecialChars($location->getId()) ?>">


<form method="post">

  <!-- <button class="btn btn-dark large" name="newLocation" >Create New Location</button> -->
<div class="single" >
			<div class="single-wrap location">
				<h1 class="single-category location" ><?= htmlSpecialChars($location->getClassification()) ?>
        </h1>
        <!-- <div class="hidden myModalLink"><?= htmlSpecialChars($location->getTravelLink()) ?></div> -->
				<div class="single-text">
					<div class="single-headline">
						<h2 class="single-title">
						<a class="myLocationName" href="<?= htmlSpecialChars($location->getTravelLink()) ?>" target="_blank">
            <?= htmlSpecialChars($location->getLocation()) ?> <?= htmlSpecialChars($location->getCountry()) ?> 
            <?= htmlSpecialChars($location->getRegion()) ?>
            </a>
						</h2>
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
          <div class="button-area">
          <!-- <button class="btn" name="delete" value="2" >Delete <?= htmlSpecialChars($location->getLocation()) ?></button> -->
          <button class="btn" name="updateLocation" value="<?= $location->getId()?>" ><span >
              <i class="fas fa-pen"></i> Edit
            </span>
            <!-- <span class="p-0"><i class="far fa-trash-alt"></i></span> -->
    
          <!-- <button class="btn" name="updateLocation" value="<?= $location->getId()?>" >Edit / Delete <?= htmlSpecialChars($location->getLocation()) ?></button> -->
          <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >New PointOfInterest</button>
          </div>
        </div>
			</div>
    </div>
    
    </form>
</div>