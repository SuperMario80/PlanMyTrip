//IIFE TO SUBMIT DATA INTO PHP / MYSQL-DATABASE
(function saveData() {
	const saveLocation = document.querySelector('#summary');
	const savePoi = document.querySelector('#poi');

	if (saveLocation) {
		saveLocation.addEventListener('click', async (e) => {
			if (e.target.id == 'phpSubmit') {
				//Key-Value Pairs to submit
				let locationValue = {
					location: currentLocation.name,
					locationKey: currentLocation.id,
					classification: currentLocation.type,
					country: currentLocation.country_id,
					region: currentLocation.part_of,
					intro: currentLocation.intro,
					travelLink: currentLocation.attribution[1].url
				};

				const data = {
					method: 'POST',
					mode: 'no-cors',
					body: JSON.stringify(locationValue),
					headers: { 'Content-Type': 'application/json' }
				};
				//Sends data for Validation via PHP
				const sendPlace = await fetch(`http://localhost/php/projects/PlanMyTrip/locRequest.php`, data)
					.then((response) => response.json())
					.then((res) => {
						//Checks Response Status when submitted
						if (res.statusText == 'OK') {
							showSubmitMsg('.btn-save-loc', 'LOCATION SAVED');
						} else {
							if (res.statusText == 'Error') {
								showSubmitMsg('.btn-save-loc', 'Location already exists');
							} else {
								showSubmitMsg('.btn-save-loc', 'no Data submitted');
							}
						}
					});
			}
		});
	}
	if (savePoi) {
		savePoi.addEventListener('click', async (e) => {
			let poiVal = e.target.getAttribute('data-count');
			currentPointofInterest = poiRes.results[poiVal];

			const infoLinkReplacement = infoLinkValue(currentPointofInterest);

			if (e.target.hasAttribute('data-count')) {
				//Key-Value Pairs to submit
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

				const data = {
					method: 'POST',
					mode: 'no-cors',
					body: JSON.stringify(poiValue),
					headers: { 'Content-Type': 'application/json' }
				};
				//Sends data for Validation via PHP
				const sendPoi = await fetch(`http://localhost/php/projects/PlanMyTrip/poiRequest.php`, data)
					.then((response) => response.json())
					//Checks Response Status when submitted
					.then((res) => {
						if (res.statusText == 'OK') {
							showSubmitMsg(`#poiSubmit${poiVal}`, 'PointOfInterest SAVED');
						} else {
							if (res.statusText == 'Error') {
								showSubmitMsg(`#poiSubmit${poiVal}`, 'PointOfInterest ALREADY EXISTS');
							} else {
								showSubmitMsg(`#poiSubmit${poiVal}`, 'PLEASE SAVE LOCATION FIRST');
							}
						}
					});
			}
		});
	}

	// RESPONSE FUNCTION TO SUBMIT STATUS AND MANIPULATE EVENT-BUTTON
	function showSubmitMsg(btnClass, message) {
		const btn = document.querySelector(btnClass);
		const originBtn = btn.innerText;
		btn.innerText = message;

		setTimeout(function() {
			if (btn.innerText !== 'PLEASE SAVE LOCATION FIRST') {
				btn.disabled = true;
				btn.classList.add('noHover');
			}
			btn.innerText = originBtn;
		}, 3000);
	}
})();
