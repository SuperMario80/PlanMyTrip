const saveLocation = document.querySelector('#summary');
const savePoi = document.querySelector('#poi');

saveLocation.addEventListener('click', async (e) => {
	const locBtn = document.querySelector('.btn-save-loc');
	// const postDataMsg = document.querySelector('#postDataMsg');
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

		console.log(data);

		const sendPlace = await fetch(`http://localhost/php/projects/PlanMyTrip/locRequest.php`, data)
			.then((response) => response.json())
			// {
			// 	console.log(response);
			// 	// console.log(response.text());
			// 	// if (response.json() != undefined) {
			// 	response.json();
			// 	// } else {
			// 	// 	alert('something went wrong');
			// 	// 	console.log(response.text());
			// 	// }
			// })
			.then((res) => {
				if (res.statusText == 'OK') {
					console.log(res.statusText);
					// alert('Location added to MySavedTrip');
					// saveLocationMsg('.single', '.single-wrap', 'Location added to MySavedTrip');
					showSubmitMsg('.btn-save-loc', 'LOCATION SAVED');
					// locBtn.disabled = true;
					// locBtn.className += ' noHover';
				} else {
					if (res.statusText == 'Error') {
						// alert('Location already exists');
						// saveLocationMsg('.single', '.single-wrap', 'Location already exists');
						showSubmitMsg('.btn-save-loc', 'Location already exists');

						// locBtn.disabled = true;
						// locBtn.className += ' noHover';
					} else {
						showSubmitMsg('.btn-save-loc', 'no Data submitted');
					}
				}
				// 	console.log(res);
				// 	return res.statusText;
				// console.log(res.JSON.serialize());
				// console.log(res.parse());
			});

		// console.log('hello', sendPlace);
		// let statusText = sendPlace.match(/\{statusText:([a-zA-Z]{2,5})\}/);
		// console.log('hello', statusText[1]);
		// const sendPlace = fetch(`https://ptsv2.com/t/arto5-1608728634/post`, data);

		// console.log('fetch', sendPlace);
		// console.log(sendPlace.statusText);
		// const sendPl = await sendPlace.json();
		// return sendPlace;
	}

	// console.log(sendPlace);
	// if (sendPlace.status == '200') {
	// locBtn.disabled = true;
	// locBtn.className += ' noHover';
	// }

	// if (locBtn) {
	// locBtn.addEventListener('click', () => {
	// });
	// }
	// console.log('show me ' + postDataMsg.innerHTML);
});

savePoi.addEventListener('click', async (e) => {
	let poiVal = e.target.getAttribute('data-count');
	const poiBtn = document.querySelector(`#poiSubmit${poiVal}`);
	currentPointofInterest = poiRes.results[poiVal];

	const infoLinkReplacement = infoLinkValue(currentPointofInterest);

	// if(e.target.id === `poiSubmit${poiVal}`) {
	if (e.target.hasAttribute('data-count')) {
		// async postPlace(){
		let poiValue = {
			poiName: currentPointofInterest.name,
			city: currentPointofInterest.location_ids[0],
			locationKey: currentLocation.id,
			attraction: currentPointofInterest.tag_labels[0],
			intro: currentPointofInterest.intro,
			infoLink: infoLinkReplacement,
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
		// const msgDivPoi = poiBtn.parentNode.parentNode.querySelector('.item-desc');

		const sendPoi = await fetch(`http://localhost/php/projects/PlanMyTrip/poiRequest.php`, data)
			.then((response) => response.json())
			// .then((response) => console.log(response.text()))
			.then((res) => {
				if (res.statusText == 'OK') {
					console.log(res);
					showSubmitMsg(`#poiSubmit${poiVal}`, 'PointOfInterest SAVED');
				} else {
					if (res.statusText == 'Error') {
						console.log(res);
						showSubmitMsg(`#poiSubmit${poiVal}`, 'PointOfInterest ALREADY EXISTS');
					} else {
						showSubmitMsg(`#poiSubmit${poiVal}`, 'NO LOCATION FOUND');
					}
				}
				// 	console.log(res);
				// 	return res.statusText;
				// console.log(res.JSON.serialize());
				// console.log(res.parse());
			});
		// const sendPlace = fetch(`https://ptsv2.com/t/arto5-1608728634/post`, data);
		// console.log(sendPoi);
		// return sendPl;
	}
});

// function saveLocationMsg(contClass, appendMsg, message) {
// 	// const btn = document.querySelector(btnVal);
// 	const container = document.querySelector(contClass);
// 	const showMsg = document.querySelector(appendMsg);
// 	const div = document.createElement('div');
// 	div.innerText = message;
// 	const msg = container.insertBefore(div, showMsg);

// 	timeout = setTimeout(function() {
// 		msg.remove();
// 	}, 3000);
// }
function showSubmitMsg(btnClass, message) {
	// const btn = document.querySelector(btnVal);
	const btn = document.querySelector(btnClass);
	const originBtn = btn.innerText;
	console.log(originBtn);
	// const showMsg = document.querySelector(appendMsg);
	// const div = document.createElement('div');
	btn.innerText = message;
	console.log(btn.innerText);

	// const msg = container.insertBefore(div, showMsg);
	// if (btn.innerText !== 'NO LOCATION FOUND') {
	setTimeout(function() {
		if (btn.innerText !== 'NO LOCATION FOUND') {
			btn.disabled = true;
			btn.className += ' noHover';
		}
		btn.innerText = originBtn;
		console.log(btn.innerText);
	}, 3000);
	// }
}

// function savePoiMsg(msgDivPoi, message) {
// 	// const container = document.querySelectorAll('.item');

// 	const div = document.createElement('div');
// 	div.innerText = message;

// 	msgDivPoi.prepend(div);

// 	timeout = setTimeout(function() {
// 		msgDivPoi.firstChild.remove();
// 	}, 5000);
// 	// return;
// }
