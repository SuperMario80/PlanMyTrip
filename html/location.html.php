<!-- 
<form method="post">
   
    <table border="1">
       
        <tr>
        <th><b><i>LOCATION</i></b></th>
        <th>Id</th>
        <th>idTraveller</th>
        <th>Location</th>
        <th>LocationKey</th>
        <th>Classification</th>
        <th>Country</th>
        <th>Region</th>
        <th>Intro</th>
        <th>TravelLink</th>
        <th>Notes</th>
        
        </tr>
            <tr>      
                <td></td>
                <td><?= $location->getId() ?></td>
                <td><?= $location->getIdTraveller() ?></td>
                <td><?= htmlSpecialChars($location->getLocation()) ?></td>
                <td><?= htmlSpecialChars($location->getLocationKey()) ?></td>
                <td><?= htmlSpecialChars($location->getClassification()) ?></td>
                <td><?= htmlSpecialChars($location->getCountry()) ?></td>
                <td><?= htmlSpecialChars($location->getRegion()) ?></td>
                <td><?= htmlSpecialChars($location->getIntro()) ?></td>
                <td><?= htmlSpecialChars($location->getTravelLink()) ?></td>
                <td><?= htmlSpecialChars($location->getNotes()) ?></td> 
             
            </tr>
         
    </table>
    <button class="btn btn-dark" name="newLocation" >new Location</button>
    <button class="btn btn-dark" name="updateLocation" value="<?= $location->getId()?>" >update Location</button>
    <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
       
   
</form> -->

<div class="content notification is-secondary">
<h3 class="content media-content ">Location</h3>
<form method="post">
    
<div class="notification is-primary">
            <div class="">Location#<?= $location->getId() ?> |  Traveller #<?= $location->getIdTraveller() ?> | 
                <a href="<?= htmlSpecialChars($location->getTravelLink()) ?>" target="_blank"> <?= htmlSpecialChars($location->getLocation()) ?> |  </a>   
              |  <?= htmlSpecialChars($location->getClassification()) ?>  |  <?= htmlSpecialChars($location->getCountry()) ?>   |  <?= htmlSpecialChars($location->getRegion()) ?> 
              </div>
            
            <div class="">INTRO:  <?= htmlSpecialChars($location->getIntro()) ?></div>
            <div class="content">Notes:  <?= htmlSpecialChars($location->getNotes()) ?></div>
          </div>
    <button class="btn btn-dark" name="newLocation" >new Location</button>
    <button class="btn btn-dark" name="updateLocation" value="<?= $location->getId()?>" >update Location</button>
    <button class="btn btn-dark" name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
       
   
</form>
</div>