let currentLocation;
let currentPointofInterest;
let poiCount;
let poiRes;

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
	},
	inputValue(location) {
		return location.id;
	},

	async fetchData(searchTerm) {
		// let api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
		// let account_id = 'BSOO2T1I';
		this.api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
		this.account_id = 'BSOO2T1I';
		const placeResponse = await fetch(
			`https://www.triposo.com/api/20201111/location.json?annotate=trigram:${searchTerm}&trigram=>=0.3&order_by=-score&account=${this
				.account_id}&token=${this.api_token}`
		);

		const place = await placeResponse.json();

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

	//clears poi results (if new request is executed)
	document.querySelector('#poi').innerHTML = '';

	try {
		// for (poiCount = 0; poiCount < 20; poiCount++) {
		for (poiCount = 0; poiRes.results.length; poiCount++) {
			let currentPointofInterest = poiRes.results[poiCount];
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
	const single = createItem('div', 'single');

	const singleWrap = createItem('div', 'single-wrap');

	const singleCategory = createItem('h1', 'single-category');
	// singleCategory.id = 'mapModal';
	singleCategory.innerText = `${removeChars(currentLocation.type).toString()}`;

	const singleText = createItem('div', 'single-text');

	const singleHeadline = createItem('div', 'single-headline');

	const singleTitle = createItem('h2', 'single-title');
	const currentRegion = removeChars(currentLocation.part_of.toString());
	const singleTL = createLink(
		'a',
		`${currentLocation.attribution[1].url}`,
		`Discover ${currentLocation.name}    ${currentRegion}`
	);

	console.log(singleTL.innerText);

	singleTitle.appendChild(singleTL);
	singleHeadline.appendChild(singleTitle);

	const singleDesc = createItem('div', 'single-desc');
	const singleDL = createLink('a', `${currentLocation.attribution[0].url}`, `${input.intro}`);

	singleDesc.appendChild(singleDL);
	singleText.appendChild(singleHeadline);
	singleText.appendChild(singleDesc);

	// if traveller is logged in, create save button
	if (addButton()) {
		//creates 3rd child of item, sets attributes and append
		const div = document.createElement('div');
		const btn = createBtn('button', 'btn large', 'phpSubmit', 'phpSubmit', 'Save Location');
		div.appendChild(btn);
		singleText.appendChild(div);
		console.log(div);
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
	const item = createItem('div', 'item');

	//creates 1st child of item
	const image = createItem('div', 'item-image');

	//creates child of image, sets attribute and append
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);
	image.appendChild(img);

	//creates 2nd child of item
	const itemText = createItem('div', 'item-text');

	//creates 1st child of itemText
	const itWrap = createItem('div', 'item-text-wrap');
	//creates 1st child of itWrap
	const itTitle = createItem('h2', 'item-text-title');
	//creates link of itTitle, sets attribute and append
	const itLink = createLink('a', `${value.attribution[1].url}`, `${value.name}`);
	itTitle.appendChild(itLink);
	//creates 2nd child of itWrap
	const itCategory = createItem('p', 'item-text-category');

	const itCatLink = createLink('a', `${value.attribution[0].url}`, `${value.tag_labels[0]}`);
	itCategory.appendChild(itCatLink);

	//creates last child of item, sets attributes and append

	const itemDesc = createItem('div', 'item-desc');

	const itemMap = createItem('p', 'item-map');
	itemMap.setAttribute('data-modal', `${poiCount}`);
	itemMap.innerHTML = 'Show on Map';
	// const itemMapLink = createLink('a', '', 'Show on Map');
	// itemMap.append(itemMapLink);

	const itemDescInner = document.createElement('p');

	itemDescInner.innerHTML = `${value.snippet}`;
	itemDesc.appendChild(itemMap);
	itemDesc.appendChild(itemDescInner);

	//appends child elements
	itWrap.appendChild(itTitle);
	itWrap.appendChild(itCategory);
	itemText.appendChild(itWrap);
	item.appendChild(image);
	item.appendChild(itemText);
	item.appendChild(itemDesc);

	// if traveller is logged in, create save button
	// if (locationTemplate.logout) {
	//creates 3rd child of item, sets attributes and append
	if (addButton()) {
		const div = document.createElement('div');
		const btn = createBtn(
			'button',
			'btn large',
			`poiSubmit${poiCount}`,
			`poiSubmit${poiCount}`,
			'Save Point of Interest'
		);
		btn.setAttribute('data-count', `${poiCount}`);
		div.appendChild(btn);
		item.appendChild(div);
		console.log(div);
	}
	// }

	//sets default value for specific result
	if (itCatLink.innerText.toLowerCase() === 'person') {
		itCatLink.innerText = 'Sightseeing';
	}

	return item;
};

// displayLocType(locationType, locationCategory);
// console.log(locationCategory);
