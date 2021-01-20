<!-- 

</div>
<div class="content notification is-secondary">
<h3 class="content media-content ">Points Of Interest</h3>
<div class="items">
<form method="post">

<?php foreach ($selectedPoi as $poi) : ?> 
    <div class="item">
			<div class="item-image">
			</div>
			<div class="item-text">
				<div class="item-text-wrap">
					<h2 class="item-text-title"><a href="<?= htmlSpecialChars($poi->getPoiMap()) ?>" ><?= htmlSpecialChars($poi->getPoiName()) ?></a></h2>
					<p class="item-text-category"><a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>"><?= htmlSpecialChars($poi->getAttraction()) ?></a></p>
					<button type="button" id="poiSubmit0" data-count="0" value="poiSubmit0" class="button block center">Submit
					</button>
				</div>
                <div class="item-desc"><?= htmlSpecialChars($poi->getIntro()) ?></div> 
                <div class="item-desc"><?= htmlSpecialChars($poi->getNotes()) ?></div> 
			</div>
        </div>
        <?php endforeach; ?>
        <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>


</form>
</div>
</div> -->

  
<div class="content notification is-secondary">
<h3 class="content media-content ">Points Of Interest</h3>
<form method="post">
    
      <?php foreach ($selectedPoi as $poi) : ?>  
<div class="notification is-primary">
            <div class="">Location#<?= $poi->getIdLocation() ?> |  #<?= $poi->getId() ?> | 
                <a href="<?= htmlSpecialChars($poi->getPoiMap()) ?>" target="_blank"> <?= htmlSpecialChars($poi->getPoiName()) ?> |  </a>
                <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" target="_blank">Map</a>    
              |  <?= htmlSpecialChars($poi->getCity()) ?>  |  <?= htmlSpecialChars($poi->getLocationKey()) ?>   |  <?= htmlSpecialChars($poi->getAttraction()) ?> 
                <button class="btn btn-dark" name="updatePoi" value="<?= $poi->getId() ?>" >update</button>
              </div>
            
            <div class="">INTRO:  <?= htmlSpecialChars($poi->getIntro()) ?></div>
            <div class="content">Notes:  <?= htmlSpecialChars($poi->getNotes()) ?></div>
          </div>
          <?php endforeach; ?>

      <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
     <button class="btn btn-dark" name="delete" value="2" >Delete Poi</button>
</form>
</div>