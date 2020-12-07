<form method="post">
<br>
    <button name="new" value="0" >add new PointOfInterest</button>
    
   
    <table border="1">
      
        <tr>
        <th></th>
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
            <td> Placeholder      </td>                      
                <td>
                    <button name="old" value="<?= $poi->getId() ?>" >update</button>
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
    
       
    <br>
</form>