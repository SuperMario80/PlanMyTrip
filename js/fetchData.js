//CALLS AUTOCOMPLETE DROPDOWN MENU AND DISPLAYS SEARCH RESULTS VIA DYNAMIC HTML TEMPLATES

createAutoComplete({
	root: document.querySelector('.autocomplete'),
	renderOption(location) {
		return `
		<div>${location.name} (${removeChars(location.type.toString())},  ${removeChars(
			location.country_id.toString()
		)})</div>
		`;
	},
	onOptionSelect(location) {
		//calls Templates and displays Results from Location Id
		onLocationSelect(location);
		showModal();
	},
	inputValue(location) {
		//returns Location Id from Dropdown Selection
		return location.id;
	},

	async fetchData(searchTerm) {
		const placeResponse = await fetch(
			`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${searchTerm}&trigram=>=0.5&order_by=-score&account=${account_id}&token=${api_token}`
		);
		const place = await placeResponse.json();

		return place.results;
	}
});

//STARTS ASYNC HTTP REQUEST WITH FETCH
let onLocationSelect = async (location) => {
	const summary = document.querySelector('#summary');
	const showcase = document.querySelector('#showcase');

	// WAITS FOR LOCATION REQUEST (CHOSEN IN DROPDOWN)
	let response = await fetch(
		`https://www.triposo.com/api/20201111/location.json?id=${location.id}&fields=all&account=${account_id}&token=${api_token}`
	);
	let res = await response.json();

	//CLEARS RESULTS TEMPLATE (WHEN NEW REQUEST IS EXECUTED)
	summary.innerHTML = '';
	currentLocation = res.results[0];

	//APPEND HTML TEMPLATE AFTER FETCH RESPONSE
	summary.append(locationTemplate(currentLocation));
	//Change Style for Search Results
	summary.classList.add('my-3');
	showcase.style.height = '43vh';

	// WAITS FOR 20 BEST POINT OF INTEREST REQUEST (FIRST 20 POI's BASED ON CUSTOMER RATING)
	let poiResponse = await fetch(
		`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${account_id}&token=${api_token}`
	);
	poiRes = await poiResponse.json();

	//CLEARS RESULTS TEMPLATE (WHEN NEW REQUEST IS EXECUTED)
	document.querySelector('#poi').innerHTML = '';
	try {
		for (poiCount = 0; poiCount < poiRes.results.length; poiCount++) {
			let currentPointofInterest = poiRes.results[poiCount];
			//APPEND HTML TEMPLATE AFTER FETCH RESPONSE
			document.querySelector('#poi').append(poiTemplate(currentPointofInterest));
		}
	} catch (e) {
		console.log(TypeError(e).message);
	}
};
