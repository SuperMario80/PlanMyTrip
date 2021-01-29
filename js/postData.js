const saveLocation = document.querySelector('#summary');
const savePoi = document.querySelector('#poi');

const modal = document.querySelector('.modal');
const sum = modal.querySelector('.summary');

savePoi.addEventListener('click', function(e) {
	let poiVal = e.target.getAttribute('data-modal');

	currentPointofInterest = poiRes.results[poiVal];
	const modalBody = document.querySelector('.modal-body');

	if (e.target.hasAttribute('data-modal')) {
		modal.classList.remove('hidden');
		let iframeMod = document.createElement('iframe');
		// iframeMod.setAttribute('data', `${currentPointofInterest.attribution[0].url}`);
		// iframeMod.setAttribute('data', `https://www.openstreetmap.org/way/19384901`);
		iframeMod.setAttribute('width', '1000');
		iframeMod.setAttribute('height', '500');
		// iframeMod.setAttribute(
		// 	'src',
		// 	`https://maps.google.com/maps/embed/v1/place?key=AIzaSyBxN9DUPNG7NoaH9uksMe755_gtXI92JEQ&q=${currentPointofInterest
		// 		.coordinates.latitude},${currentPointofInterest.coordinates.longitude}`
		// );
		iframeMod.setAttribute(
			'src',
			`https://www.openstreetmap.org/export/embed.html?bbox=${currentPointofInterest.coordinates
				.longitude}%2C${currentPointofInterest.coordinates.latitude}&amp;layer=mapnik`
		);
		// 		iframeMod.setAttribute(
		// 			'src',
		// 			`https://www.google.com/maps/embed/v1/view
		//   ?key=AIzaSyBxN9DUPNG7NoaH9uksMe755_gtXI92JEQ&center=-33.8569,151.2152
		//   &zoom=18
		//   &maptype=satellite`
		// 		);
		modalBody.appendChild(iframeMod);
		console.log(currentPointofInterest.coordinates.latitude);
		console.log(iframeMod);
	}
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== sum) return;
		modalBody.innerHTML = '';
		modal.classList.add('hidden');
	});
});

// console.log(savePhp);

saveLocation.addEventListener('click', async (e) => {
	// let regexPartOf = removeChars(currentLocation.part_of[0]);
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
		// console.log(regexPartOf);
		// prompt("Please enter the name of your playlist");
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
		// console.log(regexPartOf);
	}
});

//  let poiSub = document.getElementById('poiSubmit'.poiCount);
//  console.log(poiSub);

savePoi.addEventListener('click', (e) => {
	let poiVal = e.target.getAttribute('data-count');

	currentPointofInterest = poiRes.results[poiVal];
	// if(e.target.id === `poiSubmit${poiVal}`) {
	if (e.target.hasAttribute('data-count')) {
		// console.log(poiCount);
		// currentPointofInterest = poiRes.results[poiVal];
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
		// if (onLocationSelect.res != '') {
		// let locationData = new FormData();
		// let changeVal = removeChars(poiValue);
		// console.log(changeVal);
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

{
	/* <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=12.841987609863283%2C52.358828590091186%2C13.128662109375002%2C52.451197283310165&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=13/52.4050/12.9853">Größere Karte anzeigen</a></small> */
}
