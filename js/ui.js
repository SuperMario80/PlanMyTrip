class UI {
  constructor() {
    this.profile = document.getElementById("article");
    // location = document.getElementById("location");
  }

  // Display profile in UI
  showPlace(input) {

    for(let placeCount =0; placeCount<3; placeCount++){ 
      this.profile.innerHTML += `
        <div id="searchResults">
        <table class="d-block card card-body mb-3">
          <thead>
            <tr>
             <th>Destination </th>
             <th type="hidden" >Location ID </th>
             <th>Type </th>
             <th>Country </th>
             <th>Region</th>
             <th></th>
           </tr>
           </thead>
           <form>
             <tbody>
                <td><a href="${input.results[placeCount].attribution[1].url}" target="_blank">${input.results[placeCount].name}</a></td>
                <td type="hidden" id="location">${input.results[placeCount].id}</td>
                <td>${input.results[placeCount].type}</td>
                <td>${input.results[placeCount].country_id}</td>
                <td>${input.results[placeCount].part_of}</td>
                
                <td><input type="submit" id="search${placeCount}" value="submit" class="inline-block"></td>
              </tbody>
              </form>
        </table>
        </div>
        
      
    `;
    // <div id="pois"></div>
    // if (input.results[placeCount].type !='city'){
      //   input.results[placeCount].attribution[0].source_id = "Openstreetmap";
      //   input.results[placeCount].attribution[2].source_id = "Wikivoyage";
      //   input.results[placeCount].attribution[0].url = "undefined";
      //   input.results[placeCount].attribution[2].url = "undefined";
      // }
    }
  }

  // Show user repos
  showPois(poi) {
    console.log('hello');
    // let poiCount = 0;
    this.profile.innerHTML += `
    <h3 class="page-heading mb-3">Points of Interest</h3>
    `;
    // // let output = "";

    // // pois.forEach(function (poi) {
    // //   output += `
    // bestResults.forEach(poi => {
    // for (poi.results; poi.results>10; poi.results++){
   for(let poiCount =0; poiCount<19; poiCount++){ 
    this.profile.innerHTML += `
       
          <div class="row poiResults">
            <div class="col-md-6">${poi.results[poiCount].name}
            </div>
            <div class="col-md-6">
              <a href="${poi.results[poiCount].attribution[0].url}" target="_blank">${poi.results[poiCount].name}</a>
            </div>
            <div class="col-md-6">
              <span class="badge badge-primary">Country: ${poi.results[poiCount].location_ids[2]}</span>
              <span class="badge badge-primary">City: ${poi.results[poiCount].location_ids[0]}</span>
            </div>
            <br>
            <div class="col-md-6">
              <span class="badge badge-secondary">Watchers: ${poi.results[poiCount].score}</span>
              <span class="badge badge-success">Forks: ${poi.results[poiCount].snippet}</span>
            </div>
          </div>
       
       `;
       console.log('hello');
      }
      // }
  
    //  });

    // Output repos
    //  document.getElementById("pois").innerHTML = output;
  }

  // <div class="card card-body mb-3">
  //       <div class="row">
  //       <div class="col-md-3">
  //       <div class="badge badge-primary mb-4">Headline: ${input.results[0].name}</div>
  //       <div class="badge badge-primary mb-4">Byline: ${input.results[0].id}</div>
  //       <div class="badge badge-primary mb-4">ID: ${input.results[0].snippet}</div>
  //       <div class="badge badge-secondary mb-4">Publication Date: ${input.results[0].type}</div>
  //       <div class="badge badge-success mb-4">Word Count: ${input.results[0].parent_id}</div>
  //       <div class="badge badge-success mb-4">Word Count: ${input.results[0].part_of}</div>
  //       <div class="badge badge-info mb-4">URI: <a href="${input.results[0].attribution[1].url}" target="_blank" class="btn btn-primary btn-block mb-4"></div>
  //       <br><br>
  //       <ul class="list-group ">
  //         <li class="list-group-item">Original: ${input.osm}</li>
  //         <li class="list-group-item">Web_URL:<a href="${input.results[0].attribution[0].url}" target="_blank" class="btn btn-primary btn-block mb-4"></a></li>
  //       </ul>
  //     </div>
  //       <h3 class="page-heading mb-3">Points of Interest</h3>
  //       <div id="pois"></div>
        
  // Show alert message
  showAlert(message, className) {
    // Clear any remaining alerts
    this.clearAlert();
    // Create div
    const div = document.createElement("div");
    // Add classes
    div.className = className;
    // Add text
    div.appendChild(document.createTextNode(message));
    // Get parent
    const container = document.querySelector(".searchContainer");
    // Get search box
    const search = document.querySelector(".searchArticle");
    // Insert alert
    container.insertBefore(div, search);

    // Timeout after 3 sec
    setTimeout(() => {
      this.clearAlert();
    }, 3000);
  }

  // Clear alert message
  clearAlert() {
    const currentAlert = document.querySelector(".alert");

    if (currentAlert) {
      currentAlert.remove();
    }
  }

  // Clear profile
  clearProfile() {
    this.profile.innerHTML = "";
  }
  // clearResults(){
  //   // const searchResult = this.showPlace(input);
  //   const poiResult = document.querySelector(".poiResults");
    
  //     // Faster
  //     while(poiResult.firstChild) {
  //       poiResult.remove();
  //     }
  //   }

  }


// // Versuche mit wikivoyage und openstreetmap links
  // <div id="searchResults">
  // <table class="d-block card card-body mb-3">
  //   <thead>
  //     <tr>
  //       <th>Destination </th>
  //      <th>Type </th>
  //      <th>Country </th>
  //      <th>Region</th>
  //      <th>${input.results[placeCount].attribution[0].source_id}</th>
  //      <th>${input.results[placeCount].attribution[2].source_id}</th>
  //      <th></th>
  //    </tr>
  //    </thead>
  //    <form>
  //      <tbody>
  //         <td id="location">${input.results[placeCount].name}</td>
  //         <td>${input.results[placeCount].type}</td>
  //         <td>${input.results[placeCount].country_id}</td>
  //         <td>${input.results[placeCount].part_of}</td>
  //         <td><a href="${input.results[placeCount].attribution[0].url}" target="_blank">${input.results[placeCount].attribution[0].url}</a></td>
  //         <td><a href="${input.results[placeCount].attribution[2].url}" target="_blank">${input.results[placeCount].attribution[2].url}</a></td>
  //         <td><input type="submit" id="search${placeCount}" value="submit" class="inline-block"></td>
  //       </tbody>
  //       </form>
  // </table>
  // </div>