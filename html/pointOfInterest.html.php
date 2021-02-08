
<!-- 
  <div>
    <form method="post">
      <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >Create PointOfInterest</button>
        
        <?php foreach ($selectedPoi as $poi) : ?>  
        <div class="item saved">
          
          <div class="item-intro">
            <div class="item-desc view"><?= htmlSpecialChars($poi->getIntro()) ?>
          </div>
          <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >Edit</button>
          <button class="btn" name="delete" value="2" >Delete Poi</button>
            </div>
            <div class="item-text">
              <div class="item-text-wrap">
              <p class="item-map itemMod" data-itemMod="<?= $poi->getId() ?>">Show on Map</p>
                <div class="item-image">
        <img src="img\showcase3.jpg" alt="" />
        </div>
                <h2 class="item-text-title alt"><a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" ><?= htmlSpecialChars($poi->getPoiName()) ?></a></h2>
                <p class="item-text-category alt"><a href=""<?= htmlSpecialChars($poi->getPoiMap()) ?>"><?= htmlSpecialChars($poi->getCity()) ?></a></p>
                <p hidden class="itemMyMod" ><?= htmlSpecialChars($poi->getPoiMap()) ?></p>
              </div>
            </div>
            <div class="item-flex">
               
            </div>  
            <div class="item-notes"><?= htmlSpecialChars($poi->getNotes()) ?>
            </div> 
          </div>
          <?php endforeach; ?>

        
      </form>
    </div> -->





<div>
  <form method="post">

          
    <?php foreach ($selectedPoi as $poi) : ?>  
    <div class="single">
          <div class="single-wrap poi">
            <h1 class="single-category" ><?= htmlSpecialChars($poi->getAttraction()) ?>
            </h1>
            <div class="single-text">
              <div class="single-headline">
                <h2 class="single-title">
                  <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>"><?= htmlSpecialChars($poi->getPoiName()) ?> <?= htmlSpecialChars($poi->getCity()) ?>
                </a>
              </h2>
            </div>
            <div class="single-desc saved-data">
                <p class="item-text-category alt"><a href=""<?= htmlSpecialChars($poi->getPoiMap()) ?>">
                <div class="loc-info">
                <?= htmlSpecialChars($poi->getIntro()) ?>
                </div>
                <div class="loc-notes">
                  <h5>Your Notes</h5>
                    <p><?= htmlSpecialChars($poi->getNotes()) ?></p>
                </div>
              </div>
              <div class="button-area">
                <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >Edit</button>
                <button class="btn" name="delete" value="2" >Delete Poi</button>
                <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >New PointOfInterest</button>
              </div>
            </div>
          </div>
        </div>
          <?php endforeach; ?>
    </form>
</div>














    

<!-- 
<div>
  <form method="post">

    <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >Create PointOfInterest</button>
    <?php foreach ($selectedPoi as $poi) : ?>  
      <div class="single">
        <div class="single-wrap sight-color">
          
          <div class="single-text">
          <div class="single-headline">
            <h2 class="single-title">
            <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" ><?= htmlSpecialChars($poi->getPoiName()) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= htmlSpecialChars($poi->getCity()) ?></a>
            </h2>
          </div>
            <div class="single-desc saved-data">
              <div>
              <?= htmlSpecialChars($poi->getIntro()) ?>
              </div>
              <div class="loc-notes">
                  <?= htmlSpecialChars($poi->getNotes()) ?>
              </div>
            </div>
            <div>
              <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >Edit</button>
              <button class="btn" name="delete" value="2" >Delete Poi</button>
            </div>
          </div>
          <div class="single-category small">
            <a href="<?= htmlSpecialChars($poi->getPoiMap()) ?>" ><h4 class="small"><?= htmlSpecialChars($poi->getPoiName()) ?></h4>
            <p class="small"><?= htmlSpecialChars($poi->getAttraction()) ?></p></a>

          </div>
        </div>
      </div>
          <?php endforeach; ?>
    </form>
</div> -->