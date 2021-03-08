
<div class="headersection">
    <div class="row">
        <h1>MY SAVED ITINERARY</h1>
    </div>
    <div>
        <form method="post">
            <button class="btn btn-secondary" name="updateTraveller" value="<?= $this->getTraveller()->getId() ?>" ><span >
                <i class="fas fa-pen"></i> Edit My Profile</span>
            </button>
        </form>
    </div>
</div>
<div id="myLocationList" class="bg-light">
</div>


<div class="container">
    <div class="text-center">
        <form method="post">
            <button class="btn btn-dark x-large" name="newLocation" >Create New Location</button>
        </form>

    </div>
    <div><button class="btn btn-dark" id="expandAll" >Expand MyList</button></div>
