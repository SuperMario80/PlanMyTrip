let api_token = '9j6492j7wd3qjvppyb8hj2og788veo72';
let account_id = 'BSOO2T1I';
// let choose;

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
	currentLocation = res.results[0];
	document.querySelector('#summary').innerHTML = locationTemplate(currentLocation);

	let poiResponse = await fetch(
		`https://www.triposo.com/api/20201111/poi.json?location_id=${location.id}&fields=all&tag_labels=sightseeing&count=20&order_by=-score&account=${account_id}&token=${api_token}`
	);

	poiRes = await poiResponse.json();

	document.querySelector('#poi').innerHTML = '';

	try {
		// for (poiCount = 0; poiCount < 20; poiCount++) {
		for (poiCount = 0; poiRes.results.length; poiCount++) {
			currentPointofInterest = poiRes.results[poiCount];
			document.querySelector('#poi').append(poiTemplate(currentPointofInterest));
			// document.querySelector('#poi').innerHtml += poiTemplate(currentPointofInterest);
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
	// ${input.id}
	// return `
	//   <div class="content media-content">
	//     <form>
	//       <div><button type="button" id="phpSubmit" value="phpSubmit" class="button block right">Submit</button>
	//       </div>
	//     </form>
	//     <div class="content">
	//       <h4><a href="${input.attribution[1]
	// 			.url}" target="_blank">Location:  ${input.name}  | ${input.id}| ${input.country_id} | ${input.type}</a></h4>
	//     </div>
	//   </div>
	//   <div class="notification is-primary">
	//       <p class="small">INTRO</p>
	//       <p class="small">${input.intro}</p>
	//   </div>

	//   `;
	return `

		<div class="single">
			<div class="single-wrap">
				<h1 class="single-category">${currentLocation.type}</h1>
				<div class="single-text">
						<div class="single-headline">
							<h2 class="single-title">
							<a href="${currentLocation.attribution[1]
								.url}">Discover ${currentLocation.name} &nbsp;&nbsp;&nbsp;&nbsp;<span>${currentLocation.part_of}</span></a>
							</h2>
						</div>
					<div class="single-desc">
						<a href="${currentLocation.attribution[0].url}">${input.intro}</a>
					</div>
					<button type="button" id="phpSubmit" value="phpSubmit" class="btn block center">
					Save
					</button>
				</div>
			</div>
		</div>
		`;
};

// <div class="single-image">
// 	<a href="${currentLocation.attribution[0].url}">
// 		<img src="${currentLocation.images[0].sizes.medium.url}" alt="" />
// 	</a>
// </div>

const poiTemplate = (value) => {
	// if (document.querySelector('#poi').hasChildNodes()) {
	// 	document.querySelector('#poi').removeChild(outerDiv);
	// }
	// const outerDiv = document.createElement('div');
	//1st element
	const item = document.createElement('div');
	item.className = 'item';

	//2nd element with childNode
	const image = document.createElement('div');
	image.className = 'item-image';
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);

	const itemText = document.createElement('div');
	itemText.className = 'item-text';

	const itWrap = document.createElement('div');
	itWrap.className = 'item-text-wrap';

	const itTitle = document.createElement('h2');
	itTitle.className = 'item-text-title';

	const itLink = document.createElement('a');
	itLink.setAttribute('href', `${value.attribution[1].url}`);
	itLink.innerText = `${value.name}`;
	itTitle.appendChild(itLink);

	const itCategory = document.createElement('p');
	itCategory.className = 'item-text-category';

	const itCatLink = document.createElement('a');
	itCatLink.setAttribute('href', `${value.attribution[0].url}`);
	// wikiLink.innerText = `${value.location_ids[2]}`;
	itCatLink.innerText = `${currentPointofInterest.tag_labels[0]}`;
	itCategory.appendChild(itCatLink);

	image.appendChild(img);

	itWrap.appendChild(itTitle);
	itWrap.appendChild(itCategory);
	// console.log(logout);
	itemText.appendChild(itWrap);
	item.appendChild(image);
	item.appendChild(itemText);
	if (logout) {
		const btn = document.createElement('button');
		btn.className = 'block center btn';
		btn.id = `poiSubmit${poiCount}`;
		btn.setAttribute('type', 'button');
		btn.setAttribute('data-count', `${poiCount}`);
		btn.setAttribute('value', `poiSubmit${poiCount}`);
		btn.innerText = 'Save Point of Interest';

		item.appendChild(btn);
	}

	const itemDesc = document.createElement('div');
	itemDesc.className = 'item-desc';
	itemDesc.innerHTML = `${value.snippet}`;

	// poiName.insertAdjacentElement('afterend', country);
	// country.insertAdjacentElement('afterend', btn);
	item.appendChild(itemDesc);
	// outerDiv.appendChild(itemDiv);
	// itemDiv.insertAdjacentElement('afterend', itemDesc);

	// console.log(itemDiv);

	// console.log(itemTextDiv);
	// return outerDiv;
	return item;
};

const saveLocation = document.querySelector('#summary');
// console.log(savePhp);

saveLocation.addEventListener('click', async (e) => {
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
		console.log(locationValue);
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

		// console.log(sendPl);
		// return sendPl;
		// }
		// }
		// e.preventDefault();
		console.log(sendPlace);
	}
});
let savePoi = document.querySelector('#poi');

//  let poiSub = document.getElementById('poiSubmit'.poiCount);
//  console.log(poiSub);

savePoi.addEventListener('click', (e) => {
	let poiVal = e.target.getAttribute('data-count');

	// if(e.target.id === `poiSubmit${poiVal}`) {
	if (e.target.hasAttribute('data-count')) {
		// console.log(poiCount);

		currentPointofInterest = poiRes.results[poiVal];
		// async postPlace(){
		let poiValue = {
			poiName: currentPointofInterest.name,
			city: currentPointofInterest.location_ids[0],
			// locationKey: currentPointofInterest.location_ids[2],
			locationKey: currentLocation.id,
			// locationKey: currentPointofInterest.location_id,
			attraction: currentPointofInterest.tag_labels[0],
			intro: currentPointofInterest.snippet,
			infoLink: currentPointofInterest.attribution[1].url,
			poiMap: currentPointofInterest.attribution[0].url
			// location_ids2: currentPointofInterest.location_ids[2],
		};
		console.log(poiValue);
		// if (onLocationSelect.res != '') {
		// let locationData = new FormData();

		// locationData.append( "json", JSON.stringify(locationValue));
		const data = {
			method: 'POST',
			mode: 'no-cors',
			body: JSON.stringify(poiValue),
			headers: { 'Content-Type': 'application/json' }
		};

		const sendPoi = fetch(`http://localhost/php/projects/PlanMyTrip/poiRequest.php`, data);
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
});

//  <div class="content">
//           <span class="notification">Country:   ${value.location_ids[2]}</span>
//           <span class="notification">    |      City:  ${value.location_ids[0]}</span>
//         </div>

// PHP Submit Form

// // saveErrorMsg = document.querySelector('.save-error');

//  let locationData = new FormData();
//       locationData.append( "json", JSON.stringify(locationValue));

//       fetch(`http://localhost/php/projects/PlanMyTrip/crudLocation.php?`,
//         {
//               method: 'post',
//               body: JSON.stringify(locationData),
//               headers: { 'Content-type': 'application/json' }
//           })
//               .then(function(res){ return res.json(); })
//                console.log(res)
//               .then(function(data){ alert( JSON.stringify( data ) )
//               })
//               .then(text => console.log(text))
//               console.log(locationData.text())
//         // }

//         e.preventDefault();
//             }
//        });
