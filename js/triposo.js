class Triposo {

  

  constructor() {
  
    this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
    this.account_id = 'BSOO2T1I';

  }

    async getPlace(input) {
 
    const placeResponse = await fetch(`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${input}&trigram=>=0.3&fields=all&order_by=-trigram
    &account=${this.account_id}&token=${this.api_token}`);


    
    const place = await placeResponse.json();
  

    return {
      place, 
   
    }
  }
    async getPois(loc) {

      // let tagName;
      //  = "&tag_labels=sightseeing&"
   
    const poisResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${loc}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this.account_id}&token=${this.api_token}`);

    const pois = await poisResponse.json();

    return {
      pois
    }
  }

  



        
        

  
}