

  <div>
    <form method="post">
      <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >Create PointOfInterest</button>
        <div class="items" >
        <?php foreach ($selectedPoi as $poi) : ?>  
        <div class="item saved">
          <div class="item-intro">
              <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >Edit</button>
              <button class="btn" name="delete" value="2" >Delete Poi</button>
              <div class="item-desc view"><?= htmlSpecialChars($poi->getIntro()) ?>
              </div>
            </div>
            <div class="item-text">
              <div class="item-text-wrap">
                <h2 class="item-text-title alt"><a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" ><?= htmlSpecialChars($poi->getPoiName()) ?></a></h2>
                <p class="item-text-category alt"><a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>"><?= htmlSpecialChars($poi->getCity()) ?></a></p>
              </div>
            </div>
            <div class="item-flex">
               
            </div>  
            <div class="item-notes"><?= htmlSpecialChars($poi->getNotes()) ?>
            </div> 
          </div>
          <?php endforeach; ?>

        </div>
      </form>
    </div>
