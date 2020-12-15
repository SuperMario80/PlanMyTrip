// Init classes
const triposo = new Triposo();
console.log(triposo);
const ui = new UI();
console.log(ui);

// Search input
const searchPlace = document.getElementById("searchPlace");

searchPlace.addEventListener("click", (e) => {
  // Get input text
  // const searchText = e.target.value;
  let searchText = e.target.value;

  if (searchText !== "") {
    // if(input.results[placeCount].attribution[0].source_id)
    // Make http call
    triposo.getPlace(searchText).then((data) => {
      ui.showPlace(data.place);
    });
    searchText ="";
    // ui.clearProfile();
  }
  // triposo.getPois(searchText)
  // .then(res =>{
  //   ui.showPois(res.pois)
  // })
  else {
    searchText ="";
 
  //  ui.clearResults();
  //   // Clear profile
  //   ui.clearProfile();
  //   searchPlace.value = '';
  }
});

// searchPlace.value = '';

// const valuePois = document.getElementById('location').innerHTML;
const searchPois = document.getElementById('search');

searchPois.addEventListener('click', (e) => {
  console.log(searchPois);
  // Get input text
  const valuePois = document.getElementById('location').innerHTML;
  //  const valuePois = e.target.value;
   console.log(document.getElementById('location').innerHTML);

  if(valuePois !== ''){
    // Make http call
    triposo.getPois(valuePois)
     .then(data => {
       ui.showPois(data.pois);
       console.log(triposo);
     })
    //  .then()
   } 
});


// var newPlaylist = document.querySelector('.new-playlist');

// var savePHP = document.querySelector('.phpSubmit');
// // saveErrorMsg = document.querySelector('.save-error');


// //GLOBAL VARIABLES
// var location = [];
// var category = [];
// var country = [];
// var region = [];


// savePHP.addEventListener('click', () => {
//       // console.log(ui.showPlace(data.place))

//         if (ui.showPlace(data.place) != NULL) {

//             // //NAMING THE PLAYLIST
//             // var popup = prompt("Please enter the name of your playlist");

//             //SEND PLAYLIST DATA TO PHP
//                 fetch('http://localhost/php/projects/PlanMyTrip/crudLocation.php', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json'
//                     },
//                     body: JSON.stringify(
//                         {
//                             name: location,
//                             type: category,
//                             country_id: country,
//                             part_of: region,
//                             intro: intro,
//                             // url: travelLink
//                         })
//                 })
//                     .then(res => res.text())
//                     .then(data => console.log(data))
//                     // .catch(error => console.log(error.message))
            
//         }
        // else {
        //     saveErrorMsg.innerHTML = 'There is no playlist to save';
        // }
    // })
// }
