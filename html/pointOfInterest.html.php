
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
                  <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>"><?= htmlSpecialChars($poi->getPoiName()) ?> <?= htmlSpecialChars($poi->getCity()) ?>
                  </a>
                </h2>
              </div>
              <div class="single-desc saved-data">
                <div class="loc-info">
                  <p class="item-text-category alt"><a href=""<?= htmlSpecialChars($poi->getPoiMap()) ?>"></a></p>
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
                <button class="btn block center" name="updatePoi" value="<?= $poi->getId() ?>" >Edit</button>
                <button class="btn" name="delete" value="2" >Delete Poi</button>
                <button class="btn" name="newPoi" value="<?= $location->getId() ?>" >New PointOfInterest</button>
              </div>
          </div>
            <h1 class="single-category small" ><?= htmlSpecialChars($poi->getAttraction()) ?>
          </h1>
        </div>
      </div>
      <?php endforeach; ?>
    </form>
</div>
<div class="border-bottom"></div>

