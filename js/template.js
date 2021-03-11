const crEl = new CreateDomElement();

const locationTemplate = (input) => {
	// REGEX Filter
	const currentRegion = removeChars(currentLocation.part_of.toString());
	const currentName = removeChars(currentLocation.name.toString());

	//#1 Main Item
	const single = crEl.createItem('div', 'single');
	//#2 Wrapper Item
	const singleWrap = crEl.createItem('div', 'single-wrap');

	//#2.1 Catergory Item
	const singleCategory = crEl.createItem('h1', 'single-category');
	singleCategory.innerText = `${removeChars(currentLocation.type).toString()}`;

	//#2.2 Headline Text Wrap Item
	const singleText = crEl.createItem('div', 'single-text');
	//#2.2.1 Headline Wrap Item
	const singleHeadline = crEl.createItem('div', 'single-headline py-1');
	//#2.2.1.1 Headline Location Title
	const singleTitle = crEl.createItem('h1', 'single-title text-center');
	//#2.2.1.1.1 Headline Info Link
	const singleTL = crEl.createLink(
		'a',
		`${currentLocation.attribution[1].url}`,
		`${currentName}    ${currentRegion}`
	);

	singleTitle.appendChild(singleTL);
	singleHeadline.appendChild(singleTitle);

	//#2.2.2 Description Info Item
	const singleDesc = crEl.createItem('div', 'single-desc');
	singleDesc.innerText = `${input.intro}`;
	// const singleDL = crEl.createLink(
	// 	'a',
	// 	`https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=${currentLocation
	// 		.coordinates.latitude},${currentLocation.coordinates.longitude}`,
	// 	`${input.intro}`
	// );
	// singleDesc.appendChild(singleDL);
	singleText.appendChild(singleHeadline);
	singleText.appendChild(singleDesc);

	//2.2.3 Save Location Button (if Traveller logged in)
	if (crEl.addButton()) {
		const div = document.createElement('div');
		const btn = crEl.createBtn(
			'button',
			'btn-save-loc btn btn-highlight large mx-1',
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

	//Adds Background Color depending on Result of Category-Type
	displayLocType(singleCategory, singleWrap);

	return single;
};

const poiTemplate = (value) => {
	//#1 Main Item
	const item = crEl.createItem('div', 'item my-3');

	//#1.1 Image Item Wrapper
	const image = crEl.createItem('div', 'item-image');

	//#1.1.1 Image Item
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);
	image.appendChild(img);

	//#1.2 Item Text
	const itemText = crEl.createItem('div', 'item-text');

	//#1.2.1 Item Text Wrap
	const itWrap = crEl.createItem('div', 'item-text-wrap');
	//#1.2.1 Item Text Title
	const itTitle = crEl.createItem('h2', 'item-text-title');
	itTitle.innerHTML = `${removeChars(value.name.toString())}`;
	//#1.2.1 Item Text Category
	const itCategory = crEl.createItem('p', 'item-text-category py-0');
	itCategory.innerHTML = `${value.tag_labels[0]}`;

	//#1.2.2 Item Description Wrap
	const itemDesc = crEl.createItem('div', 'item-desc');
	//#1.2.2.1 Item Info Link
	const itLinkDiv = crEl.createItem('div', 'itLinkDiv');
	//#1.2.2.1.1 Item Info Link Wrap
	const itLink = crEl.createItem('p', 'item-link py-0');

	//checks if Info Link Key-Value exists
	const linkReplacement = infoLinkValue(value);

	//#1.2.2.1.1.1 Item Info Link
	const itLinkTag = crEl.createLink('a', `${linkReplacement}`, 'more Info');
	itLink.appendChild(itLinkTag);

	//#1.2.2.1.2 Item GoogleMaps Modal
	const itemMap = crEl.createItem('p', 'item-map py-0');
	itemMap.setAttribute('data-modal', `${poiCount}`);
	itemMap.innerHTML = 'Show on Map';

	//#1.2.3 Item Description Info
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

	//#1.2.4 Save PointOfIntererst Button (if Traveller logged in)
	if (crEl.addButton()) {
		const div = document.createElement('div');
		const btn = crEl.createBtn(
			'button',
			'btn btn-highlight mx-1',
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
	if (currentItem) {
		if (currentItem.attribution.length >= 3) {
			keyValReplacement = currentItem.attribution[2].url;
		} else {
			if (currentItem.attribution.length >= 2) {
				keyValReplacement = currentItem.attribution[1].url;
			} else {
				keyValReplacement = 'https://en.wikivoyage.org/';
			}
		}
	}
	return keyValReplacement;
}
