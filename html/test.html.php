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

   <!-- // //CHECKS IF EMAIL AND PASSWORD MATCH WITH 
                        // //EXISTING TRAVELLER IN DATABASE
                        // $travellers = $this->readAll();
                        // foreach ($travellers as $traveller) {
                        //     if ($traveller->getEmail() == $email){
                        //         if($traveller->getPassword() == $password) {
                        //         return $traveller;
                        //         }
                        //     }
                                
                        // }
                        // return null; -->


<div class="_2fwljDfL _4k6PXJvU"><div class="_24eSqyGI" >
    <div><div class="_2xBKA6Ka">
        <div class="HLvj7Lh5 _1jvubpIi _2-dmJ6kF">Eine kosmopolitische Stadt mit dem gewissen Extra</div>
    </div>
    <div class="HLvj7Lh5 ciJH8P2l _3HScvxZ7">
        <div class="_3y4w8kK3 _1Eip5_6m"> Zur letzten Instanz, ein Restaurant aus dem 16.&nbsp;Jahrhundert, das regelmäßig von Napoleon und Beethoven besucht wurde.
        </div></div></div></div><div class="_1OcjLO8L -d0roeAA"><div class="jLMjK2-9 _5H6Ki15F _7ypdSaPp"><div class="_2J1VzU11"><div class="_2ftMalEe">Beginnen Sie noch heute mit der Planung für Berlin</div><div class="_1wTRESvl"><div class="_3ciEbaVk">Erstellen Sie eine Reise, um all Ihre Reiseideen zu speichern, zu organisieren und auf einer Karte anzuzeigen.</div></div><div class="_3laoFWAf"><button class="_1JOGv2rJ _2oWqCEVy _3yBiBka1 _3fiJJkxX" type="button"><div class="_2NygRSyd">Reise erstellen</div></button></div></div><div class="_2Vjmfhq9"><img src="https://static.tacdn.com/img2/brand/trips/image_trips_card_medium.png" alt="" class="_1SJDQppT">
    </div><div></div></div></div></div>