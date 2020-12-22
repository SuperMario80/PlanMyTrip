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
        // if(results[placeCount].attribution[0].source_id)
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


// GLOBAL VARIABLES
// let loc = ui.showPlace(searchPlace).querySelector('.loc').textContent;
// let classification = ui.showPlace().querySelector('.classification').textContent;
// let country = ui.showPlace().querySelector('.country').textContent;
// let region = ui.showPlace().querySelector('.region').textContent;
// let intro = ui.showPlace().querySelector('.intro').textContent;
// let travelLink = ui.showPlace().querySelector('.travelLink').textContent;
// let locationVal = [];
// let category = [];
// let country = [];
// let region = [];
// let intro = [];
// let travelLink = [];
// console.log(category);
// console.log(country);
// console.log(region);
// console.log(intro);
// console.log(travelLink);
// let locationValue = {
//           name: ui.searchPlace.name,
//           type: ui.searchPlace.type,
//           country_id: ui.searchPlace.country_id,
//           part_of: ui.searchPlace.part_of,
//           intro: ui.searchPlace.intro,
//           // url: searchPlace.attribution[1].url,
          
//           };


savePHP.addEventListener('click',{




    async postPlace(){
           let locationValue = {
              name: ui.searchPlace.name,
              type: ui.searchPlace.type,
              country_id: ui.searchPlace.country_id,
              part_of: ui.searchPlace.part_of,
              intro: ui.searchPlace.intro,
              // url: searchPlace.attribution[1].url,
          
          };
          let locationData = new FormData();
          locationData.append( "json", JSON.stringify(locationValue));
          
          const sendPlace = await fetch(`http://localhost/php/projects/PlanMyTrip/crudLocation.php?`,
            {
                  method: 'post',
                  body: JSON.stringify(locationData),
                  headers: { 'Content-type': 'application/json' }
              })


              const sendPl = await sendPlace.json();

        return {
          sendPl
          }
                  
              
        }
        

        });
        console.log(savePHP);

                  // .then(text => console.log(text))
                  // console.log(locationData.text())

            // }
            
          
    // //   },
    // //   body: 
    // //   'name=${loc}&type=${category}&country_id=${country}&part_of={region}&intro=${intro}&url=${travelLink}'
    // //   // 'name=Germany&type=country&country_id=Germany'
      
      
    // //   JSON.stringify(
    // //     {
    // //       name: loc,
    // //       type: classification,
    // //       country_id: country,
    // //       part_of: region,
    // //       intro: intro,
    // //       url: travelLink,
    // //       name: name,
    // //       type: type,
    // //       country_id: country_id,
    // //       part_of: part_of,
    // //       intro: intro,
    // //       url: url,
    // //     })
    // //   })
    // //   .then(res => res.text())
    // //   .then(data => console.log(data))
    // //   console.log(localHost);// 
    // //   .catch(error => console.log(error.message))
      
      // }
      // else {
        //     saveErrorMsg.innerHTML = 'There is no data to save';
        // }
        
//NEUER VERSUCH


        
        
          
          // let locationData = new FormData();
          // locationData.append( "json", JSON.stringify(locationValue));
          
          // fetch(`http://localhost/php/projects/PlanMyTrip/crudLocation.php?`,
          //   {
          //         method: 'post',
          //         body: JSON.stringify(locationData),
          //         headers: { 'Content-type': 'application/json' }
          //     })
          //         .then(function(res){ return res.json(); })
          //          console.log(res)
          //         .then(function(data){ alert( JSON.stringify( data ) )
          //         })
          //         // .then(text => console.log(text))
          //         // console.log(locationData.text())

          //   // }
            
          //   e.preventDefault();
          //  })
          