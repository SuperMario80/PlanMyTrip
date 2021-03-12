<?php
//    TEMPLATE FOR ALL SAVED POINTS OF INTEREST
?>
<div class="hidden mb-3">
  <div>
    <h3 class="my-0 text-center">Points Of Interest
    </h3>
    <form method="post">

      <?php foreach ($selectedPoi as $poi) : ?>  
      <div class="single mb-1">
            <div class="single-wrap poi">
              <div class="bg-primary single-text">
                <div class="bg-light single-headline py-1 text-left">
                  <h3 class="single-title alt-color ">
                    <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" target="_blank"><?= htmlSpecialChars($poi->getPoiName()) ?> <?= htmlSpecialChars($poi->getCity()) ?>
                    </a>
                  </h3>
                </div>
                <div class="single-desc saved-data">
                <div class="myModalLink hidden"><?= htmlSpecialChars($poi->getPoiMap()) ?></div>
                  <div class="loc-info py-0">
                    <p class="item-map savedItemMap" data-poi="<?= htmlSpecialChars($poi->getId()) ?>">show on Map
                    </p>
                    <p class="py-0">
                      <?= htmlSpecialChars($poi->getIntro()) ?>
                    </p>
                  </div>
                  <div class="loc-notes py-0">
                    <h5 >MY NOTES</h5>
                    <p><?= htmlSpecialChars($poi->getNotes()) ?></p>
                  </div>
                </div>
            </div>
            <div class="single-category small">
              <h4 class="font-s my-2" ><?= htmlSpecialChars($poi->getAttraction()) ?>
              </h4>
            <button class="btn" name="updatePoi" value="<?= $poi->getId() ?>" >
              <span class="p-0">
                <i class="fas fa-pen"></i> Edit
              </span>
            </button>
          </div>
          </div>
        </div>
        <?php endforeach; ?>
      </form>
  </div>

</div>