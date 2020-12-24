var currentLocation;




createAutoComplete({
  
  root: document.querySelector('.autocomplete'),
  renderOption(location) {
    //  const imgSrc = location.images[0].source_url === 'N/A' ? '' : location.images[0].source_url;
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
    currentLocation = res.results[0];
    document.querySelector('#summary').innerHTML = locationTemplate(currentLocation);
    
    const poiResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this.account_id}&token=${this.api_token}`);
    
    const poiRes = await poiResponse.json();
    for(let poiCount =0; poiCount<20; poiCount++){ 
          document.querySelector('#summary').innerHTML += poiTemplate(poiRes.results[poiCount]);
          // if(poiCount<19){
          //   console.log('only' + poiCount + 'PointsOfInterest available');
          // }
        }
      //  return res;
  };

const locationTemplate = input => {
  // <pre>${JSON.stringify(input,null,2)}</pre>
  // ${input.id} 
  return `
 
      <div class="content media-content">
       <form>
        <div><button type="button" id="phpSubmit" value="phpSubmit" class="button block right">Submit</button></div>
        </form>
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



const savePhp = document.querySelector('#summary');
console.log(savePhp);


savePhp.addEventListener('click',async (e)=>{
      
    if(e.target.id == 'phpSubmit') {
      
      
      // async postPlace(){
        let locationValue = {
          
          name: currentLocation.name,
          type: currentLocation.type,
          country_id: currentLocation.country_id,
          part_of: currentLocation.part_of,
          intro: currentLocation.intro,
          url: currentLocation.attribution[1].url,
        };
        console.log(locationValue);
      // if (onLocationSelect.res != '') {
      // let locationData = new FormData();

      // locationData.append( "json", JSON.stringify(locationValue));
      const data =  {
        method: 'POST',
        // mode: 'no-cors',
        body: JSON.stringify(locationValue),
        headers: { 'Content-Type': 'application/json' }
      };

      const sendPlace = await fetch(`http://localhost/php/projects/PlanMyTrip/locationApiRequest.php`, data);
      // const sendPlace = fetch(`https://ptsv2.com/t/arto5-1608728634/post`, data);
        
        // const sendPl = await sendPlace.json();
        
        // console.log(sendPl);
        // return sendPl;
        // }
      // }
      // e.preventDefault();
      }
  });

  
  
  
  
  //  <div class="content">
  //           <span class="notification">Country:   ${value.location_ids[2]}</span>
  //           <span class="notification">    |      City:  ${value.location_ids[0]}</span>
  //         </div>


  // PHP Submit Form

  // // saveErrorMsg = document.querySelector('.save-error');
  

  
    //  let locationData = new FormData();
    //       locationData.append( "json", JSON.stringify(locationValue));
          
    //       fetch(`http://localhost/php/projects/PlanMyTrip/crudLocation.php?`,
    //         {
    //               method: 'post',
    //               body: JSON.stringify(locationData),
    //               headers: { 'Content-type': 'application/json' }
    //           })
    //               .then(function(res){ return res.json(); })
    //                console.log(res)
    //               .then(function(data){ alert( JSON.stringify( data ) )
    //               })
    //               .then(text => console.log(text))
    //               console.log(locationData.text())
    //         // }
            
    //         e.preventDefault();
    //             }
    //        });

