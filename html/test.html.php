<!-- POI Table example -->

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


<!-- Location Table Example -->

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