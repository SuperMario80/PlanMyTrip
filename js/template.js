const crEl = new CreateDomElement();

const locationTemplate = (input) => {
	const single = crEl.createItem('div', 'single my-3');

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

	//creates 2nd child of itWrap
	const itCategory = crEl.createItem('p', 'item-text-category');
	itCategory.innerHTML = `${value.tag_labels[0]}`;

	//creates last child of item, sets attributes and append

	const itemDesc = crEl.createItem('div', 'item-desc');
	const itLinkDiv = crEl.createItem('div', 'itLinkDiv');

	const itLink = crEl.createItem('p', 'item-link py-0');
	// console.log(itLink);

	const linkReplacement = infoLinkValue(value);

	// try {
	const itLinkTag = crEl.createLink('a', `${linkReplacement}`, 'more Info');
	itLink.appendChild(itLinkTag);

	const itemMap = crEl.createItem('p', 'item-map py-0');
	itemMap.setAttribute('data-modal', `${poiCount}`);
	itemMap.innerHTML = 'Show on Map';

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
