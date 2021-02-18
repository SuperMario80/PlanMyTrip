const saveLocation = document.querySelector('#summary');
const savePoi = document.querySelector('#poi');
const modal = document.querySelector('.modal');
const sum = modal.querySelector('.summary');

// const itemMap = document.querySelector('.item-map');
// console.log(itemMap);

saveLocation.addEventListener('click', async (e) => {
	// console.log('click');
	const locBtn = document.querySelector('.btn-save-loc');
	// console.log(locBtn);
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
	}
	if (locBtn) {
		locBtn.disabled = true;
		locBtn.className += ' noHover';
	}
});

savePoi.addEventListener('click', async (e) => {
	let poiVal = e.target.getAttribute('data-count');
	const poiBtn = document.querySelector(`#poiSubmit${poiVal}`);
	currentPointofInterest = poiRes.results[poiVal];
	// if(e.target.id === `poiSubmit${poiVal}`) {
	if (e.target.hasAttribute('data-count')) {
		// console.log(poiCount);
		// async postPlace(){
		let poiValue = {
			poiName: currentPointofInterest.name,
			city: currentPointofInterest.location_ids[0],
			// locationKey: currentPointofInterest.location_ids[2],
			locationKey: currentLocation.id,
			attraction: currentPointofInterest.tag_labels[0],
			intro: currentPointofInterest.snippet,
			infoLink: currentPointofInterest.attribution[1].url,
			poiMap: `https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=${currentPointofInterest
				.coordinates.latitude},${currentPointofInterest.coordinates.longitude}`
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

		const sendPoi = await fetch(`http://localhost/php/projects/PlanMyTrip/poiRequest.php`, data);
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
	if (currentPointofInterest) {
		poiBtn.disabled = true;
		poiBtn.className += ' noHover';
		// locBtn.blur();
	}
});

// document.addEventListener('load', loadLocationList);
// console.log(loadLocationList);

savePoi.addEventListener('click', function(e) {
	// console.log(itemMap);
	const modalVal = e.target.getAttribute('data-modal');

	currentPointofInterest = poiRes.results[modalVal];
	// const modalBody = document.querySelector('.modal-body');

	if (e.target.hasAttribute('data-modal')) {
		modal.classList.remove('hidden');
		let iframeMod = document.querySelector('.iframeMod');
		// iframeMod.setAttribute('data', `${currentPointofInterest.attribution[0].url}`);
		// iframeMod.setAttribute('data', `https://www.openstreetmap.org/way/19384901`);
		// iframeMod.setAttribute('width', '900vw');
		// iframeMod.setAttribute('height', '550vh');
		// iframeMod.setAttribute('frameborder', '2');
		// iframeMod.setAttribute('style', 'border:0');
		// iframeMod.setAttribute('allowfullscreen', '');
		iframeMod.setAttribute(
			'src',
			`https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=${currentPointofInterest
				.coordinates.latitude},${currentPointofInterest.coordinates.longitude}&zoom=14`
		);
		// iframeMod.setAttribute(
		// 	'src',
		// 	`https://www.openstreetmap.org/export/embed.html?bbox=${currentPointofInterest.coordinates
		// 		.longitude}%2C${currentPointofInterest.coordinates.latitude}&amp;layer=mapnik`
		// );
		// 		iframeMod.setAttribute(
		// 			'src',
		// 			`https://www.google.com/maps/embed/v1/view
		//   ?key=AIzaSyBxN9DUPNG7NoaH9uksMe755_gtXI92JEQ&center=-33.8569,151.2152
		//   &zoom=18
		//   &maptype=satellite`
		// 		);
		// modalBody.appendChild(iframeMod);
		// console.log(currentPointofInterest.coordinates.latitude);
		// console.log(iframeMod);
	}
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== sum) return;
		// modalBody.innerHTML = '';
		modal.classList.add('hidden');
	});
});
// disableButton();

// console.log(disableButton);
// function disableButton() {
// 	// if (locationTemplate != '') {
// 	const locBtn = document.querySelector('#locBtn');
// 	console.log(locBtn);

// 	locBtn.addEventListener('click', function() {
// 		// if (locBtn) {
// 		locBtn.disabled = true;
// 		// }
// 	});
// 	return true;
// 	// }
// }

// function mySavedLocModal() {
// 	const savedItemMap = document.querySelectorAll('.savedItemMap');
// 	console.log(savedItemMap);

// 	for (let i = 0; i < savedItemMap.length; i++) {
// 		console.log('hello');
// 		savedItemMap[i].addEventListener('click', function(e) {
// 			const myModalLink = document.querySelector('.myModalLink');
// 			// const itemMyMod = document.querySelector('.itemMyMod');
// 			// currentPointofInterest = poiRes.results[poiVal];
// 			// const modalVal = e.target.getAttribute('data-poi');
// 			// const myModalVal = myModalLink[modalVal];

// 			// currentPointofInterest = poiRes.results[modalVal];
// 			// const modalBody = document.querySelector('.modal-body');

// 			if (e.target.hasAttribute('data-poi')) {
// 				modal.classList.remove('hidden');
// 				let iframeMod = document.querySelector('.iframeMod');

// 				iframeMod.setAttribute('src', `${myModalLink.innerText}`);
// 			}
// 			modal.addEventListener('click', function(e) {
// 				if (e.target !== modal && e.target !== sum) return;
// 				modal.classList.add('hidden');
// 			});
// 			e.preventDefault();
// 		});
// 	}
// }

// mySavedLocModal();
// const itemMap = document.querySelector('.item-text-category');

// itemMap.addEventListener('click', function(e) {
// 	const itemMyMod = document.querySelector('.itemMyMod');

// 	// currentPointofInterest = poiRes.results[poiVal];

// 	modal.classList.remove('hidden');
// 	let iframeMod = document.querySelector('.iframeMod');

// 	iframeMod.setAttribute('src', `${itemMyMod.innerText}`);

// 	modal.addEventListener('click', function(e) {
// 		if (e.target !== modal && e.target !== sum) return;
// 		modal.classList.add('hidden');
// 	});
// 	e.preventDefault();
// });

// {
/* <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=12.841987609863283%2C52.358828590091186%2C13.128662109375002%2C52.451197283310165&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=13/52.4050/12.9853">Größere Karte anzeigen</a></small> */
// }
