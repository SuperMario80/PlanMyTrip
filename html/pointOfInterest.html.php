 
<div class="hidden">
<div class="mb-3">
  <h6 class="s-heading">
        All Properties
      </h6>
  <form method="post">

          
    <?php foreach ($selectedPoi as $poi) : ?>  
    <div class="single my-3">
          <div class="single-wrap poi">
            
            <div class="bg-primary single-text">
              <div class="bg-secondary single-headline">
                <h2 class="single-title">
                  <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" target="_blank"><?= htmlSpecialChars($poi->getPoiName()) ?> <?= htmlSpecialChars($poi->getCity()) ?>
                  </a>
                </h2>
              </div>
              <div class="single-desc saved-data">
               <div class="myModalLink hidden"><?= htmlSpecialChars($poi->getPoiMap()) ?></div>
                <div class="loc-info">
                  <p class="item-map savedItemMap" data-poi="<?= htmlSpecialChars($poi->getId()) ?>">show on Map
                  </p>
                  <!-- <a class="savedItemMap" href="<?= htmlSpecialChars($poi->getPoiMap()) ?>">show on Map</a> -->
                  <p>
                    <?= htmlSpecialChars($poi->getIntro()) ?>
                  </p>
                </div>
                <div class="loc-notes">
                  <h5>Your Notes</h5>
                  <p><?= htmlSpecialChars($poi->getNotes()) ?></p>
                </div>
              </div>
              <div class="button-area">
                <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >
                  <span class="p-0">
                    <i class="fas fa-pen"></i> Edit
                  </span>
                </button>
                <!-- <button class="btn" name="delete" value="2" >Delete Poi</button> -->
                <!-- <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >New PointOfInterest</button> -->
              </div>
          </div>
            <h1 class="single-category small" ><?= htmlSpecialChars($poi->getAttraction()) ?>
          </h1>
        </div>
      </div>
      <?php endforeach; ?>
    </form>
</div>
<!-- <div class="border-bottom"></div> -->
</div>

   <!-- <button type="button" class=" text-center collapsible " data-expand="<?= $poi->getId() ?>">
    <i class="fas fa-minus"> </i>
    <span> <?= htmlSpecialChars($poi->getPoiName()) ?> </span> <span><?= htmlSpecialChars($location->getLocation()) ?> </span> <span> <?= htmlSpecialChars($poi->getCity()) ?> </span> <span> <?= htmlSpecialChars($poi->getAttraction()) ?></span></button> -->