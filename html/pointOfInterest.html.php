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


<!-- <div class="content notification is-secondary">
<h3 class="content media-content ">Points Of Interest</h3>
<form method="post">

<?php foreach ($selectedPoi as $poi) : ?> 
<li class="results-grid__col">
    <div class="square">
        <div class="results-grid__inner">
            <div class="zoom-image-holder">
                <div class="zoom-image-holder__inner results-grid-result__inner">
                    <a href="https://travelpicker.com/destinations/africa/cape-verde/" class="js-destination" data-post_title="Cape Verde" data-post_name="cape-verde" data-post_id="70" data-result_index="1">
                        <span class="results-grid-result__title__holder">
                            <span class="results-grid-result__title">Cape Verde</span>
                            <span class="results-grid-result__subtitle">Africa</span>
                        </span>
                        <ul class="results-grid-result__meta"></ul>
                    </a>
                    <img src="https://travelpicker.com/wp-content/uploads/2015/12/shutterstock_363111110-380x380.jpg" class="zoom" alt="Africa">
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-dark" name="updatePoi" value="<?= $poi->getId() ?>" >update</button>
              </div>
</li>
<?php endforeach; ?>

      <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
     <button class="btn btn-dark" name="delete" value="2" >Delete Poi</button>

</form>
</div> -->