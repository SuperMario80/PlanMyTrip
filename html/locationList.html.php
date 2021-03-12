<?php
//    TEMPLATE FOR SHOWMYTRIP LOCATION LIST
?>
<div class="headersection myList">
    <div>
        <form method="post">
            <button class="btn btn-secondary large" name="newLocation" ><i class="fas fa-plus-circle"> </i>  Location</button>
        </form>
    </div>
    <div class="row">
        <h1>ShowMyTrip</h1>
    </div>
    <div>
        <form method="post">
            <button class="btn btn-secondary large" name="updateTraveller" value="<?= $this->getTraveller()->getId() ?>" ><span>
                <i class="fas fa-pen"></i> MyProfile</span>
            </button>
        </form>
    </div>
</div>

<div class="container">
    
    <div>
        <button class="btn-block btn-dark large" id="expandAll" >Click To Expand
        </button> 
    </div>
