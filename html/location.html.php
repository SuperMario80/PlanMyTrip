<form method="post">
   
    <table border="1">
       
        <tr>
        <th><b><i>LOCATION</i></b></th>
        <th>Id</th>
        <th>idTraveller</th>
        <th>Location</th>
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
                <td><?= htmlSpecialChars($location->getClassification()) ?></td>
                <td><?= htmlSpecialChars($location->getCountry()) ?></td>
                <td><?= htmlSpecialChars($location->getRegion()) ?></td>
                <td><?= htmlSpecialChars($location->getIntro()) ?></td>
                <td><?= htmlSpecialChars($location->getTravelLink()) ?></td>
                <td><?= htmlSpecialChars($location->getNotes()) ?></td> 
             
            </tr>
         
    </table>
    <button name="newLocation" >new Location</button>
    <button name="updateLocation" value="<?= $location->getId()?>" >update Location</button>
    <button name="newPoi" value="<?= $location->getId() ?>" >new PointOfInterest</button>
       
   
</form>