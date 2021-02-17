<div class="wrap my-4" id="scrollId-<?= htmlSpecialChars($location->getId()) ?>" data-scrollId="<?= htmlSpecialChars($location->getId()) ?>">
<form method="post">

  <!-- <button class="btn btn-dark large" name="newLocation" >Create New Location</button> -->
<div class="single" >
			<div class="single-wrap">
				<h1 class="single-category" ><?= htmlSpecialChars($location->getClassification()) ?>
        </h1>
        <!-- <div class="hidden myModalLink"><?= htmlSpecialChars($location->getTravelLink()) ?></div> -->
				<div class="single-text">
					<div class="single-headline">
						<h2 class="single-title">
						<a class="myLocationName" href="<?= htmlSpecialChars($location->getTravelLink()) ?>">
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
          <button class="btn" name="updateLocation" value="<?= $location->getId()?>" ><span class="p-0">
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