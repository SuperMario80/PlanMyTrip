<form method="post">
   
    <table border="1">
       <h1>PlanMyTrip <button name="new" value="0" >   add new Location</button></h1>
        <tr>
        <th></th>
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
        <?php 
        foreach ($selectedLoc as $location) :
        ?>
            <tr>
                <td>
                    <button name="old2" value="<?= $location->getId() ?>" >update</button>
                </td>
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
        <?php endforeach; ?>
    </table>
       
   
</form>