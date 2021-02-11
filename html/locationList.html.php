
<form method="post">
    
    <ul>
        <li>
            <?= htmlSpecialChars($location->getLocation()) ?>
            <?= htmlSpecialChars($location->getCountry()) ?>
            <?= htmlSpecialChars($location->getRegion()) ?>
            
        </li>
    </ul>
</form>