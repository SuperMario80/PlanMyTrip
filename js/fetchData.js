//GLOBAL VARIABLES

const api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
const account_id = 'BSOO2T1I';

let currentLocation;
let currentPointofInterest;
let poiCount;
let poiRes;

createAutoComplete({
	root: document.querySelector('.autocomplete'),
	renderOption(location) {
		return `
		<div>${location.name}      (${removeChars(location.type.toString())},    ${removeChars(
			location.country_id.toString()
		)})</div>
		`;
	},
	onOptionSelect(location) {
		onLocationSelect(location);
		showModal();
	},
	inputValue(location) {
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

let onLocationSelect = async (location) => {
	let response = await fetch(
		`https://www.triposo.com/api/20201111/location.json?id=${location.id}&fields=all&account=${account_id}&token=${api_token}`
	);
	let res = await response.json();
	document.querySelector('#summary').innerHTML = '';
	currentLocation = res.results[0];
	document.querySelector('#summary').append(locationTemplate(currentLocation));

	let poiResponse = await fetch(
		`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${account_id}&token=${api_token}`
	);
	poiRes = await poiResponse.json();
	//clears poi results (if new request is executed)
	document.querySelector('#poi').innerHTML = '';
	try {
		for (poiCount = 0; poiCount < poiRes.results.length; poiCount++) {
			let currentPointofInterest = poiRes.results[poiCount];
			document.querySelector('#poi').append(poiTemplate(currentPointofInterest));
		}
	} catch (e) {
		console.log(TypeError(e).message);
	}
};

// // #1 save as array in LocalStorage
// function getLocation() {
// 	if (localStorage.getItem('places') === null) {
// 		places = [];
// 	} else {
// 		places = JSON.parse(localStorage.getItem('places'));
// 	}

// 	return places;
// }

// //#3 display book in UI / HTML
// function displayLocation() {
// 	const places = getLocation();

// 	// places.forEach(function(place) {
// 	onLocationSelect(places);
// 	// return place;
// 	// });
// 	// return places;
// }
// //#2 add Book to Local Storage
// function addPlace(place) {
// 	const places = getLocation();

// 	places.push(place);

// 	localStorage.setItem('places', JSON.stringify(places));
// 	// return places;
// }
// // #4 remove Book from LocalStorage
// function removeLocation() {
// 	const places = getLocation();

// 	places.forEach(function(place) {
// 		console.log(place);

// 		// if (places != []) {
// 		// places = [];
// 		// if (places) {
// 		places.splice(place, 1);
// 		// }
// 	});
// 	localStorage.setItem('places', JSON.stringify(places));
// 	// }
// }
