let currentLocation;
let currentPointofInterest;
let poiCount;
let poiRes;
const crEl = new CreateDomElement();
// document.addEventListener('DOMContentLoaded', displayLocation);
// displayLocation();

// let locationType = document.querySelector('.single-category');
// let locationCategory = document.querySelector('.single-wrap');

createAutoComplete({
	root: document.querySelector('.autocomplete'),
	renderOption(location) {
		// const imgSrc =
		// 		location.images[0].sizes.thumbnail.url === 'N/A' ? '' :
		// 		location.images[0].sizes.thumbnail.url;
		// return `
		// <div><img class="thumbnail" src="${imgSrc}" />${location.name}      (${location.type},    ${location.country_id})</div>
		// `;
		// location = removeChars(location.toString());
		return `
		<div>${location.name}      (${removeChars(location.type.toString())},    ${removeChars(
			location.country_id.toString()
		)})</div>
		`;
	},
	onOptionSelect(location) {
		onLocationSelect(location);
		showModal();
		// console.log(addPlace(location));
		// document.addEventListener('DOMContentLoaded', displayLocation());
		// // console.log(displayLocation());

		// removeLocation();

		// displayLocation();
		// document.addEventListener('DOMContentLoaded', displayLocation);
		// removeLocation();
		// 	const places = getLocation();

		// 	places.forEach(function(place) {
		// 		onLocationSelect(place);
		// 		console.log(place);
		// 	});
		// });
	},
	inputValue(location) {
		return location.id;
	},

	async fetchData(searchTerm) {
		// let api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
		// let account_id = 'BSOO2T1I';
		// var myHeaders = new Headers();
		// myHeaders.append('Content-Type', 'application/json; charset=UTF-8');
		this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
		this.account_id = 'BSOO2T1I';
		const placeResponse = await fetch(
			`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${searchTerm}&trigram=>=0.5&order_by=-score&account=${this
				.account_id}&token=${this.api_token}`
		);
		// ,myHeaders);

		const place = await placeResponse.json();
		// console.log(place);

		return place.results;
	}
});

let onLocationSelect = async (location) => {
	let response = await fetch(
		`https://www.triposo.com/api/20201111/location.json?id=${location.id}&fields=all&account=${this
			.account_id}&token=${this.api_token}`
	);
	let res = await response.json();
	document.querySelector('#summary').innerHTML = '';
	currentLocation = res.results[0];
	document.querySelector('#summary').append(locationTemplate(currentLocation));

	let poiResponse = await fetch(
		`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${this
			.account_id}&token=${this.api_token}`
	);
	poiRes = await poiResponse.json();
	// console.log(poiRes);
	//clears poi results (if new request is executed)
	document.querySelector('#poi').innerHTML = '';
	try {
		// for (poiCount = 0; poiCount < 20; poiCount++) {
		for (poiCount = 0; poiCount < poiRes.results.length; poiCount++) {
			let currentPointofInterest = poiRes.results[poiCount];
			document.querySelector('#poi').append(poiTemplate(currentPointofInterest));
		}
	} catch (e) {
		console.log(TypeError(e).message);
		// if (poiCount < 19) {
		// 	console.log('only ' + (poiCount + 1) + ' PointsOfInterest available');
		// 	// console.log(poiTemplate(currentPointofInterest));
		// 	// currentPointofInterest = currentPoi[poiCount];
		// 	//  return res;
		// }
	}

	// addPlace(location);
	// displayLocation();
	// document.addEventListener('DOMContentLoaded', displayLocation);
	// return;
};

const locationTemplate = (input) => {
	// <pre>${JSON.stringify(input,null,2)}</pre>
	// const single = document.createDocumentFragment('div');
	// const single = createItem('div', 'single my-3');
	// let crEl = new CreateDomElement();
	console.log(crEl.createItem);
	const single = crEl.createItem('div', 'single my-3');
	console.log(single);

	const singleWrap = crEl.createItem('div', 'single-wrap');

	const singleCategory = crEl.createItem('h1', 'single-category');
	// singleCategory.id = 'mapModal';
	singleCategory.innerText = `${removeChars(currentLocation.type).toString()}`;

	const singleText = crEl.createItem('div', 'single-text');

	const singleHeadline = crEl.createItem('div', 'single-headline');

	const singleTitle = crEl.createItem('h2', 'single-title');
	const currentRegion = removeChars(currentLocation.part_of.toString());
	const currentName = removeChars(currentLocation.name.toString());
	const singleTL = crEl.createLink(
		'a',
		`${currentLocation.attribution[1].url}`,
		`${currentName}    ${currentRegion}`
	);

	console.log(singleTL.innerText);

	singleTitle.appendChild(singleTL);
	singleHeadline.appendChild(singleTitle);

	const singleDesc = crEl.createItem('div', 'single-desc');
	const singleDL = crEl.createLink(
		'a',
		`https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=${currentLocation
			.coordinates.latitude},${currentLocation.coordinates.longitude}`,
		`${input.intro}`
	);

	singleDesc.appendChild(singleDL);
	singleText.appendChild(singleHeadline);
	singleText.appendChild(singleDesc);

	// if logged in, create save button
	if (crEl.addButton()) {
		//creates 3rd child of item, sets attributes and append
		const div = document.createElement('div');
		const btn = crEl.createBtn(
			'button',
			'btn-save-loc btn btn-highlight large',
			'phpSubmit',
			'phpSubmit',
			'Save Location'
		);
		div.appendChild(btn);
		singleText.appendChild(div);
	}
	singleWrap.appendChild(singleCategory);
	singleWrap.appendChild(singleText);

	single.appendChild(singleWrap);

	displayLocType(singleCategory, singleWrap);

	return single;
};

const poiTemplate = (value) => {
	//creates wrapper item
	// const item = document.createDocumentFragment('div');
	const item = crEl.createItem('div', 'item my-3');

	//creates 1st child of item
	const image = crEl.createItem('div', 'item-image');

	//creates child of image, sets attribute and append
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);
	image.appendChild(img);

	//creates 2nd child of item
	const itemText = crEl.createItem('div', 'item-text');

	//creates 1st child of itemText
	const itWrap = crEl.createItem('div', 'item-text-wrap');
	//creates 1st child of itWrap
	const itTitle = crEl.createItem('h2', 'item-text-title');
	itTitle.innerHTML = `${removeChars(value.name.toString())}`;
	//creates link of itTitle, sets attribute and append
	// const itLink = createLink('a', `${value.attribution[1].url}`, `${removeChars(value.name.toString())}`);
	// itTitle.appendChild(itLink);
	//creates 2nd child of itWrap
	const itCategory = crEl.createItem('p', 'item-text-category');
	itCategory.innerHTML = `${value.tag_labels[0]}`;

	// const itCatLink = createLink('a', `${value.attribution[0].url}`, `${value.tag_labels[0]}`);
	// itCategory.appendChild(itCatLink);

	//creates last child of item, sets attributes and append

	const itemDesc = crEl.createItem('div', 'item-desc');
	const itLinkDiv = crEl.createItem('div', 'itLinkDiv');

	const itLink = crEl.createItem('p', 'item-link py-0');
	// console.log(itLink);

	const linkReplacement = infoLinkValue(value);

	// try {
	const itLinkTag = crEl.createLink('a', `${linkReplacement}`, 'more Info');
	itLink.appendChild(itLinkTag);
	// } catch (e) {
	// 	// console.log(Error(e).message);
	// 	Error(e).message;
	// 	// itLinkTag = createLink('a', `${value.attribution[0].url}`, 'more Info');
	// 	// itLink.appendChild(itLinkTag);
	// }
	// let infoLinkUrl;
	// let itLinkTag;

	// try {
	// 	infoLinkUrl = value.attribution[2].url;
	// } catch (e) {
	// 	if (infoLinkUrl === undefined) {
	// 		console.log(Error(e).message);
	// 		infoLinkUrl = value.attribution[0].url;

	// 		itLinkTag = createLink('a', `${infoLinkUrl}`, 'more Info');
	// 		// return itLinkTag;
	// 	}
	// }

	// console.log(value.attribution[2].url);

	const itemMap = crEl.createItem('p', 'item-map py-0');
	itemMap.setAttribute('data-modal', `${poiCount}`);
	itemMap.innerHTML = 'Show on Map';

	// const itemMapLink = createLink('a', '', 'Show on Map');
	// itemMap.append(itemMapLink);

	const itemDescInner = document.createElement('div');

	itemDescInner.innerHTML = `${value.intro}`;
	itLinkDiv.appendChild(itLink);
	itLinkDiv.appendChild(itemMap);
	itemDesc.appendChild(itLinkDiv);
	itemDesc.appendChild(itemDescInner);

	//appends child elements
	itWrap.appendChild(itTitle);
	itWrap.appendChild(itCategory);
	itemText.appendChild(itWrap);
	item.appendChild(image);
	item.appendChild(itemText);
	item.appendChild(itemDesc);

	// if traveller is logged in, create save button
	if (crEl.addButton()) {
		//creates 3rd child of item, sets attributes and append
		const div = document.createElement('div');
		const btn = crEl.createBtn(
			'button',
			'btn btn-highlight',
			`poiSubmit${poiCount}`,
			`poiSubmit${poiCount}`,
			'Save Point of Interest'
		);
		btn.setAttribute('data-count', `${poiCount}`);
		div.appendChild(btn);
		item.appendChild(div);
	}

	//sets default value for specific result
	if (itCategory.innerText.toLowerCase() === 'person') {
		itCategory.innerText = 'Sightseeing';
	}

	return item;
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

function infoLinkValue(currentItem) {
	let keyValReplacement;
	if (currentItem.attribution.length >= 3) {
		keyValReplacement = currentItem.attribution[2].url;
	} else {
		if (currentItem.attribution.length >= 2) {
			keyValReplacement = currentItem.attribution[1].url;
		} else {
			keyValReplacement = 'https://en.wikivoyage.org/';
		}
	}
	return keyValReplacement;
}
