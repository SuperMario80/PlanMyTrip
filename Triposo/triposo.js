class Triposo {

  

  constructor() {
  
    this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
    this.account_id = 'BSOO2T1I';
    // this.type='country';
    
    // this.repos_count = 5;
    // this.repos_sort = 'created: asc';
  }

    async getPlace(input) {
   
    
   
    // const placeResponse = await fetch(`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${input}
    // &trigram=>=0.3&type=${this.type}&order_by=-trigram
    // &account=${this.account_id}&token=${this.api_token}`);
    const placeResponse = await fetch(`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${input}&trigram=>=0.3&fields=all&order_by=-trigram
    &account=${this.account_id}&token=${this.api_token}`);

    // const poisResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${input}&account=${this.account_id}&token=${this.api_token}`);

    
    const place = await placeResponse.json();
    // const pois = await poisResponse.json();
    // const repos = await repoResponse.json();

    return {
      place, 
      // pois
      // repos
    }
  }
    async getPois(location) {

      // let tagName;
      //  = "&tag_labels=sightseeing&"
   
    const poisResponse = await fetch(`https://www.triposo.com/api/20201111/poi.json?location_id=${location}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this.account_id}&token=${this.api_token}`);

    const pois = await poisResponse.json();

    return {
      pois
    }
  }

  
}