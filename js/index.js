createAutoComplete({
  
  root: document.querySelector('.autocomplete'),
  renderOption(location) {
    // const imgSrc = movie.Poster === 'N/A' ? '' : movie.Poster;
    // return `
    //   <div>${location.results.name} (${location.results.id}) ${location.results.country_id} ${location.results.type}</div>
      
    // `;
    return `
    <img src="" />${location.name} | ${location.id} | (${location.country_id}, ${location.type})
    `;
    
  },
  onOptionSelect(location) {
    onLocationSelect(location);
  },
  inputValue(location) {
    return location.id;
    
  },
  //  onOptionSelectPoi(poi) {
  //   onPoiSelect(poi);
  // },
  
  async fetchData(searchTerm) {
    this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
    this.account_id = 'BSOO2T1I';
    const placeResponse = await fetch(`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${searchTerm}&trigram=>=0.3&order_by=-trigram
    &account=${this.account_id}&token=${this.api_token}`);

    const place = await placeResponse.json();


      return place.results;
      
      
    }
  });

const onLocationSelect = async location => {

  const response = await fetch(`https://www.triposo.com/api/20201111/location.json?id=${location.id}&fields=all&account=${this.account_id}&token=${this.api_token}`);
  
  const res = await response.json();

  document.querySelector('#summary').innerHTML = locationTemplate(res.results[0]);
  // return resResult.results;

  const poiResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this.account_id}&token=${this.api_token}`);
  
  const poiRes = await poiResponse.json();
   for(let poiCount =0; poiCount<20; poiCount++){ 
        document.querySelector('#summary').innerHTML += poiTemplate(poiRes.results[poiCount]);
        // if(poiCount<19){
        //   console.log('only + ${poiCount} + PointsOfInterest available');
        // }
      
       }

  };

const locationTemplate = input => {
  // <pre>${JSON.stringify(input,null,2)}</pre>
  // ${input.id} 
  return `
 
      
      <div class="content media-content">
        <div class="content">
          <h4><a href="${input.attribution[1].url}" target="_blank">Location:  ${input.name} | ${input.country_id} | ${input.type}</a></h4>
        </div>
      </div>
      <div class="notification is-primary">
          <p class="small">INTRO</p>
          <p class="small">${input.intro}</p>
      </div>
      `;
    };
    // <div><input type="submit" id="phpSubmit" value="phpSubmit" class="button block right"></div>
      // <input type="submit" id="search" value="submit" class="inline-block"></input>


// const onPointOfInterestSelect = async poi => {

//   const poiResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${poi.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this.account_id}&token=${this.api_token}`);
  
//   const poiRes = await poiResponse.json();


//       for(let poiCount =0; poiCount<19; poiCount++){ 
//         resultPoi = document.querySelector('#summaryPoi').innerHTML += poiTemplate(poiRes.results[poiCount]);
//         return resultPoi;
//       }
//   };

const poiTemplate = value => {
  // <pre>${JSON.stringify(value,null,2)}</pre>
  // ${input.id} 
  return `
        
        <div class="content media-content notification is-secondary">
        
            <div class="content">
              <a href="${value.attribution[1].url}" target="_blank">PointOfInterest     </a>:     
              <a href="${value.attribution[0].url}" target="_blank">    ${value.name}</a>  
              |  ${value.location_ids[0]} |  ${value.location_ids[2]}</div>
            <div class="content">INTRO:  ${value.snippet}</div>
          </div>
          
       
       `;
    };

    //  <div class="content">
    //           <span class="notification">Country:   ${value.location_ids[2]}</span>
    //           <span class="notification">    |      City:  ${value.location_ids[0]}</span>
    //         </div>


    // PHP Submit Form

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
              name: location.name,
              type: location.type,
              country_id: location.country_id,
              part_of: location.part_of,
              intro: location.intro,
              url: location.attribution[1].url,
          
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
        console.log(savePHP.sendPl);


