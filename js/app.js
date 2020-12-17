// Init classes
const triposo = new Triposo();
console.log(triposo);
const ui = new UI();
console.log(ui);

// Search input
const searchPlace = document.getElementById("searchPlace");

const placeResult = searchPlace.addEventListener("click", (e) => {
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

let savePHP = document.querySelector('#phpSubmit');
// // saveErrorMsg = document.querySelector('.save-error');


//GLOBAL VARIABLES
let location = document.querySelector('.loc').value;
let category = document.querySelector('.category');
let country = document.querySelector('.country').value;
let region = document.querySelector('.region').value;
let intro = document.querySelector('.intro').value;
let travelLink = document.querySelector('.travelLink').value;
// // console.log(loc);
// console.log(category);
// console.log(country);
// console.log(region);
// console.log(intro);
// console.log(travelLink);


savePHP.addEventListener('click', () => {

        let locationValue = {
            name: location,
            type: category,
            country_id: country,
            part_of: region,
            intro: intro,
            url: travelLink,

        };

        let locationData = new FormData();
        locationData.append( "json", JSON.stringify( locationValue ) );

        fetch('http://localhost/php/projects/PlanMyTrip/crudLocation.php',
          {
              method: 'post',
              body: JSON.stringify(locationData),
              headers: { 'Content-type': 'application/json' }
          })
              .then(function(res){ return res.json(); })
              .then(function(locationData){ alert( JSON.stringify( locationData ) )
              console.log(locationData)
          })

        // }








        

        // if (placeResult != NULL) {



      //       //SEND DATA TO PHP
      //         let localHost = fetch('http://localhost/php/projects/PlanMyTrip/crudLocation.php?', {
      //               method: 'POST',
      //               headers: {
      //                   'Content-Type': 'application/x-www-form-urlencoded'
      //               },
      //               body: 
      //               'name=${loc}&type=${category}&country_id=${country}&part_of={region}&intro=${intro}&url=${travelLink}'
      //               // 'name=Germany&type=country&country_id=Germany'
                    

      // //                        JSON.stringify(
      // //                         {
      // //                             name: location,
      // //                             type: category,
      // //                             country_id: country,
      // //                             part_of: region,
      // //                             intro: intro,
      // //                             url: travelLink
      // //                         })
      //           })
      //               .then(res => res.text())
      //               .then(data => console.log(data))
      //               console.log(localHost);// .catch(error => console.log(error.message))
            
      //   // }
      //   // else {
      //   //     saveErrorMsg.innerHTML = 'There is no data to save';
      //   // }
    })

