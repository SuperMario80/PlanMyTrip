<!-- <form method="post">
    
    
   
    <table border="1">
      
        <tr>
        <th><b><i>PointOfInterest</i></b></th>
        <th></th>
        <th>Id</th>
        <th>idLocation</th>
        <th>PointOfInterest</th>
        <th>Attraction</th>
        <th>Intro</th>
        <th>InfoLink</th>
        <th>Map</th>
        <th>notes</th>
        </tr>
        
        <?php foreach ($selectedPoi as $poi) : ?>
            <tr>
            <td></td>                      
                <td>
                    <button name="updatePoi" value="<?= $poi->getId() ?>" >update</button>
                </td>
                   
                <td><?= $poi->getId() ?></td>
                <td><?= $poi->getIdLocation() ?></td>
                <td><?= htmlSpecialChars($poi->getPoiName()) ?></td>
                <td><?= htmlSpecialChars($poi->getAttraction()) ?></td>
                <td><?= htmlSpecialChars($poi->getIntro()) ?></td>
                <td><?= htmlSpecialChars($poi->getInfoLink()) ?></td>
                <td><?= htmlSpecialChars($poi->getPoiMap()) ?></td>
                <td><?= htmlSpecialChars($poi->getNotes()) ?></td>
            </tr>
        <?php endforeach; ?>
        
    </table>
     <button name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
     <button name="delete" value="2" >Delete Poi</button>
       
    <div>-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
    <br>
    <br>
</form> -->

<div class="content notification is-secondary">
<h3 class="content media-content ">Points Of Interest</h3>
<form method="post">
    
      <?php foreach ($selectedPoi as $poi) : ?>  
<div class="notification is-primary">
            <div class="">#<?= $poi->getId() ?> |  Location #<?= $poi->getIdLocation() ?> | 
                <a href="<?= htmlSpecialChars($poi->getPoiMap()) ?>" target="_blank"> <?= htmlSpecialChars($poi->getPoiName()) ?> |  </a>
                <a href="<?= htmlSpecialChars($poi->getInfoLink()) ?>" target="_blank">Map</a>    
              |  <?= htmlSpecialChars($poi->getAttraction()) ?>     
                <button name="updatePoi" value="<?= $poi->getId() ?>" >update</button>
              </div>
            <div class="">INTRO:  <?= htmlSpecialChars($poi->getIntro()) ?></div>
            <div class="content">Notes:  <?= htmlSpecialChars($poi->getNotes()) ?></div>
          </div>
          <?php endforeach; ?>

      <button name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
     <button name="delete" value="2" >Delete Poi</button>
</form>
</div>