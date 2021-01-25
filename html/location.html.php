<div>
<form method="post">

  <button class="btn" name="newLocation" >Create New Location</button>
<div class="single">
			<div class="single-wrap">
				<h1 class="single-category"><?= htmlSpecialChars($location->getClassification()) ?></h1>
				<div class="single-text">
					<div class="single-headline">
						<h2 class="single-title">Destination &nbsp;&nbsp;
						<a href="<?= htmlSpecialChars($location->getTravelLink()) ?>"><?= htmlSpecialChars($location->getLocation()) ?> <?= htmlSpecialChars($location->getCountry()) ?> <?= htmlSpecialChars($location->getRegion()) ?></a>
						</h2>
					</div>
					<div class="single-desc saved-data">
            <div>
            <?= htmlSpecialChars($location->getIntro()) ?>
            </div>
            <div class="loc-notes">
                <?= htmlSpecialChars($location->getNotes()) ?>
            </div>
          </div>
          <div>
          <button class="btn" name="updateLocation" value="<?= $location->getId()?>" >EDIT</button>
          <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >Create  POINT OF INTEREST</button>
          </div>
        </div>
			</div>
    </div>
    
    </form>
</div>