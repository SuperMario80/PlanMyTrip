const saveLocation = document.querySelector('#summary');
const savePoi = document.querySelector('#poi');
// console.log(savePhp);

saveLocation.addEventListener('click', async (e) => {
	if (e.target.id == 'phpSubmit') {
		// async postPlace(){
		let locationValue = {
			location: currentLocation.name,
			locationKey: currentLocation.id,
			classification: currentLocation.type,
			country: currentLocation.country_id,
			region: currentLocation.part_of,
			intro: currentLocation.intro,
			travelLink: currentLocation.attribution[1].url
		};
		console.log(locationValue);
		// if (onLocationSelect.res != '') {
		// let locationData = new FormData();

		// locationData.append( "json", JSON.stringify(locationValue));
		const data = {
			method: 'POST',
			mode: 'no-cors',
			body: JSON.stringify(locationValue),
			headers: { 'Content-Type': 'application/json' }
		};

		const sendPlace = await fetch(`http://localhost/php/projects/PlanMyTrip/locRequest.php`, data);
		// const sendPlace = fetch(`https://ptsv2.com/t/arto5-1608728634/post`, data);

		// const sendPl = await sendPlace.json();

		// console.log(sendPl);
		// return sendPl;
		// }
		// }
		// e.preventDefault();
		console.log(sendPlace);
	}
});

//  let poiSub = document.getElementById('poiSubmit'.poiCount);
//  console.log(poiSub);

savePoi.addEventListener('click', (e) => {
	let poiVal = e.target.getAttribute('data-count');

	// if(e.target.id === `poiSubmit${poiVal}`) {
	if (e.target.hasAttribute('data-count')) {
		// console.log(poiCount);

		currentPointofInterest = poiRes.results[poiVal];
		// async postPlace(){
		let poiValue = {
			poiName: currentPointofInterest.name,
			city: currentPointofInterest.location_ids[0],
			// locationKey: currentPointofInterest.location_ids[2],
			locationKey: currentLocation.id,
			attraction: currentPointofInterest.tag_labels[0],
			intro: currentPointofInterest.snippet,
			infoLink: currentPointofInterest.attribution[1].url,
			poiMap: currentPointofInterest.attribution[0].url
		};
		console.log(poiValue);
		// if (onLocationSelect.res != '') {
		// let locationData = new FormData();

		// locationData.append( "json", JSON.stringify(locationValue));
		const data = {
			method: 'POST',
			mode: 'no-cors',
			body: JSON.stringify(poiValue),
			headers: { 'Content-Type': 'application/json' }
		};

		const sendPoi = fetch(`http://localhost/php/projects/PlanMyTrip/poiRequest.php`, data);
		// const sendPlace = fetch(`https://ptsv2.com/t/arto5-1608728634/post`, data);

		// const sendPl = await sendPlace.json();

		// console.log(sendPl);
		// return sendPl;
		// }
		// }
		// e.preventDefault();
		console.log(e.target.id);
		console.log(sendPoi);
	}
});
