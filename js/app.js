let api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
let account_id = 'BSOO2T1I';

let currentLocation;
let currentPointofInterest;
let poiCount;
let poiRes;
let logout = document.querySelector('#logout');

createAutoComplete({
	root: document.querySelector('.autocomplete'),
	renderOption(location) {
		// const imgSrc =
		// 		location.images[0].sizes.thumbnail.url === 'N/A' ? '' :
		// 		location.images[0].sizes.thumbnail.url;
		// return `
		// <div><img class="thumbnail" src="${imgSrc}" />${location.name}      (${location.type},    ${location.country_id})</div>
		// `;

		return `
			<div>${location.name}      (${location.type},    ${location.country_id})</div>
			`;
	},
	onOptionSelect(location) {
		onLocationSelect(location);
	},
	inputValue(location) {
		return location.id;
	},

	async fetchData(searchTerm) {
		// this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
		// this.account_id = 'BSOO2T1I';
		const placeResponse = await fetch(
			`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${searchTerm}&trigram=>=0.3&order_by=-score&account=${account_id}&token=${api_token}`
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
		// for (poiCount = 0; poiCount < 20; poiCount++) {
		for (poiCount = 0; poiRes.results.length; poiCount++) {
			currentPointofInterest = poiRes.results[poiCount];
			document.querySelector('#poi').append(poiTemplate(currentPointofInterest));
		}
	} catch (e) {
		console.log(TypeError(e));

		// if (poiCount < 19) {
		// 	console.log('only ' + (poiCount + 1) + ' PointsOfInterest available');
		// 	// console.log(poiTemplate(currentPointofInterest));
		// 	// currentPointofInterest = currentPoi[poiCount];

		// 	//  return res;
		// }
	}
};

const locationTemplate = (input) => {
	// <pre>${JSON.stringify(input,null,2)}</pre>

	// const single = document.createDocumentFragment('div');
	const single = document.createElement('div');
	single.className = 'single';

	const singleWrap = document.createElement('div');
	singleWrap.className = 'single-wrap';

	const singleCategory = document.createElement('h1');
	singleCategory.className = 'single-category';
	singleCategory.innerText = `${currentLocation.type}`;

	// if (singleCategory.innerText.toLowerCase() === 'country') {
	// 	singleWrap.className = 'single-wrap country';
	// }
	// if (singleCategory.innerText.toLowerCase() === 'region') {
	// 	singleWrap.className = 'single-wrap region';
	// }
	// if (singleCategory.innerText.toLowerCase() === 'city') {
	// 	singleWrap.className = 'single-wrap city';
	// }
	// displayLocType();
	console.log(singleWrap.className);

	const singleText = document.createElement('div');
	singleText.className = 'single-text';

	const singleHeadline = document.createElement('div');
	singleHeadline.className = 'single-headline';

	const singleTitle = document.createElement('h2');
	singleTitle.className = 'single-title';

	let currentRegion = removeChars(currentLocation.part_of[0]);
	const singleTL = createLink(
		'a',
		`${currentLocation.attribution[1].url}`,
		`Discover ${currentLocation.name}    ${currentRegion}`
	);

	displayLocType(singleCategory, singleWrap);
	// const singleTL = document.createElement('a');
	// singleTL.setAttribute('href', `${currentLocation.attribution[1].url}`);
	// singleTL.setAttribute('target', '_blank');
	// let currentRegion = removeChars(currentLocation.part_of[0]);
	// singleTL.innerText = `Discover ${currentLocation.name}    ${currentRegion}`;

	// currentRegion.value.replace('_', '');
	console.log(singleTL.innerText);

	singleTitle.appendChild(singleTL);

	// console.log(singleTl);

	singleHeadline.appendChild(singleTitle);

	const singleDesc = document.createElement('div');
	singleDesc.className = 'single-desc';

	// const singleDL = document.createElement('a');
	// singleDL.setAttribute('href', `${currentLocation.attribution[0].url}`);
	// singleDL.setAttribute('target', '_blank');
	// singleDL.innerText = `${input.intro}`;
	const singleDL = createLink('a', `${currentLocation.attribution[0].url}`, `${input.intro}`);
	console.log(singleDL);

	singleDesc.appendChild(singleDL);

	singleText.appendChild(singleHeadline);
	singleText.appendChild(singleDesc);

	// if traveller is logged in, create save button
	if (logout) {
		//creates 3rd child of item, sets attributes and append
		const btn = document.createElement('button');
		btn.className = 'single-btn btn';
		btn.id = `phpSubmit`;
		btn.setAttribute('type', 'button');
		btn.setAttribute('value', 'phpSubmit');
		btn.innerText = 'Save Location';

		singleText.appendChild(btn);
	}
	singleWrap.appendChild(singleCategory);
	singleWrap.appendChild(singleText);

	single.appendChild(singleWrap);
	// displayLocType();

	return single;
};

const poiTemplate = (value) => {
	//creates wrapper item
	// const item = document.createDocumentFragment('div');
	const item = document.createElement('div');
	item.className = 'item';

	//creates 1st child of item
	const image = document.createElement('div');
	image.className = 'item-image';
	//creates child of image, sets attribute and append
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);
	image.appendChild(img);

	//creates 2nd child of item
	const itemText = document.createElement('div');
	itemText.className = 'item-text';

	//creates 1st child of itemText
	const itWrap = document.createElement('div');
	itWrap.className = 'item-text-wrap';

	//creates 1st child of itWrap
	const itTitle = document.createElement('h2');
	itTitle.className = 'item-text-title';
	//creates child of itTitle, sets attribute and append
	const itLink = document.createElement('a');
	itLink.setAttribute('href', `${value.attribution[1].url}`);
	itLink.setAttribute('target', '_blank');
	itLink.innerText = `${value.name}`;
	itTitle.appendChild(itLink);

	//creates 2nd child of itWrap
	const itCategory = document.createElement('p');
	itCategory.className = 'item-text-category';

	//creates child of itCategory, sets attribute and append
	const itCatLink = document.createElement('a');
	itCatLink.setAttribute('href', `${value.attribution[0].url}`);
	itCatLink.setAttribute('target', '_blank');
	itCatLink.innerText = `${currentPointofInterest.tag_labels[0]}`;
	itCategory.appendChild(itCatLink);
	//sets default value for specific result
	if (itCatLink.innerText.toLowerCase() === 'person') {
		itCatLink.innerText = 'Sightseeing';
	}

	//appends child elements to itWrap
	itWrap.appendChild(itTitle);
	itWrap.appendChild(itCategory);

	itemText.appendChild(itWrap);

	item.appendChild(image);
	item.appendChild(itemText);

	//creates last child of item, sets attributes and append
	const itemDesc = document.createElement('div');
	itemDesc.className = 'item-desc';
	itemDesc.innerHTML = `${value.snippet}`;

	item.appendChild(itemDesc);

	// if traveller is logged in, create save button
	if (logout) {
		//creates 3rd child of item, sets attributes and append
		const btn = document.createElement('button');
		btn.className = 'block center btn';
		btn.id = `poiSubmit${poiCount}`;
		btn.setAttribute('type', 'button');
		btn.setAttribute('data-count', `${poiCount}`);
		btn.setAttribute('value', `poiSubmit${poiCount}`);
		btn.innerText = 'Save Point of Interest';

		item.appendChild(btn);
	}

	// console.log(itemTextDiv);
	return item;
};

// let removeChars = (char) => {
// 	return char.replace(/_/g, ' ');
// };

// displayLocType();
function removeChars(str) {
	if (str) {
		return str.replace(/_/g, ' ');
	} else {
		return str;
	}
}

function createLink(element, href, innerText) {
	let link = document.createElement(element);
	link.setAttribute('href', href);
	link.setAttribute('target', '_blank');
	link.innerText = innerText;

	return link;
	// parent.appendChild(link);
}

// test redirect when saved

// let saveMyLoc = document.querySelector('#saveMyLoc');
// saveMyLoc.addEventListener('click', (e) => {
// 	e.target.replace('travellerArea.php');
// 	// return saveThis;
// });

function displayLocType(locType, wrap) {
	// let wrap = document.querySelector('.single-wrap');
	// let locType = document.querySelector('.single-category');
	if (locType.innerText.toLowerCase() === 'country') {
		wrap.className = 'single-wrap country';
	}
	if (locType.innerText.toLowerCase() === 'region') {
		wrap.className = 'single-wrap region';
	}
	if (locType.innerText.toLowerCase() === 'city') {
		wrap.className = 'single-wrap city';
	}
	return wrap;
}
