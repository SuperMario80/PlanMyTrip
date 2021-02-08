<div>
<form method="post">

  <button class="btn btn-dark large" name="newLocation" >Create New Location</button>
<div class="single">
			<div class="single-wrap">
				<h1 class="single-category" ><?= htmlSpecialChars($location->getClassification()) ?></h1>
				<div class="single-text">
					<div class="single-headline">
						<h2 class="single-title">
						<a href="<?= htmlSpecialChars($location->getTravelLink()) ?>"><?= htmlSpecialChars($location->getLocation()) ?> <?= htmlSpecialChars($location->getCountry()) ?> <?= htmlSpecialChars($location->getRegion()) ?></a>
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
          <button class="btn" name="delete" value="2" >Delete <?= htmlSpecialChars($location->getLocation()) ?></button>
          <button class="btn" name="updateLocation" value="<?= $location->getId()?>" >Edit <?= htmlSpecialChars($location->getLocation()) ?></button>
          <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >New PointOfInterest</button>
          </div>
        </div>
			</div>
    </div>
    
    </form>
</div>