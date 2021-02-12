const modal = document.querySelector('.modal');
const sum = modal.querySelector('.summary');

loadLocationList();
// document.addEventListener('load', loadLocationList);
// console.log(loadLocationList);

savePoi.addEventListener('click', function(e) {
	// console.log(itemMap);
	const modalVal = e.target.getAttribute('data-modal');

	currentPointofInterest = poiRes.results[modalVal];
	// const modalBody = document.querySelector('.modal-body');

	if (e.target.hasAttribute('data-modal')) {
		modal.classList.remove('hidden');
		let iframeMod = document.querySelector('.iframeMod');
		// iframeMod.setAttribute('data', `${currentPointofInterest.attribution[0].url}`);
		// iframeMod.setAttribute('data', `https://www.openstreetmap.org/way/19384901`);
		// iframeMod.setAttribute('width', '900vw');
		// iframeMod.setAttribute('height', '550vh');
		// iframeMod.setAttribute('frameborder', '2');
		// iframeMod.setAttribute('style', 'border:0');
		// iframeMod.setAttribute('allowfullscreen', '');
		iframeMod.setAttribute(
			'src',
			`https://maps.google.com/maps/embed/v1/place?key=AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q=${currentPointofInterest
				.coordinates.latitude},${currentPointofInterest.coordinates.longitude}&zoom=14`
		);
		// iframeMod.setAttribute(
		// 	'src',
		// 	`https://www.openstreetmap.org/export/embed.html?bbox=${currentPointofInterest.coordinates
		// 		.longitude}%2C${currentPointofInterest.coordinates.latitude}&amp;layer=mapnik`
		// );
		// 		iframeMod.setAttribute(
		// 			'src',
		// 			`https://www.google.com/maps/embed/v1/view
		//   ?key=AIzaSyBxN9DUPNG7NoaH9uksMe755_gtXI92JEQ&center=-33.8569,151.2152
		//   &zoom=18
		//   &maptype=satellite`
		// 		);
		// modalBody.appendChild(iframeMod);
		// console.log(currentPointofInterest.coordinates.latitude);
		// console.log(iframeMod);
	}
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== sum) return;
		// modalBody.innerHTML = '';
		modal.classList.add('hidden');
	});
});

// function mySavedLocModal() {
// 	const savedItemMap = document.querySelectorAll('.savedItemMap');
// 	console.log(savedItemMap);

// 	for (let i = 0; i < savedItemMap.length; i++) {
// 		console.log('hello');
// 		savedItemMap[i].addEventListener('click', function(e) {
// 			const myModalLink = document.querySelector('.myModalLink');
// 			// const itemMyMod = document.querySelector('.itemMyMod');
// 			// currentPointofInterest = poiRes.results[poiVal];
// 			// const modalVal = e.target.getAttribute('data-poi');
// 			// const myModalVal = myModalLink[modalVal];

// 			// currentPointofInterest = poiRes.results[modalVal];
// 			// const modalBody = document.querySelector('.modal-body');

// 			if (e.target.hasAttribute('data-poi')) {
// 				modal.classList.remove('hidden');
// 				let iframeMod = document.querySelector('.iframeMod');

// 				iframeMod.setAttribute('src', `${myModalLink.innerText}`);
// 			}
// 			modal.addEventListener('click', function(e) {
// 				if (e.target !== modal && e.target !== sum) return;
// 				modal.classList.add('hidden');
// 			});
// 			e.preventDefault();
// 		});
// 	}
// }

// mySavedLocModal();
// const itemMap = document.querySelector('.item-text-category');

// itemMap.addEventListener('click', function(e) {
// 	const itemMyMod = document.querySelector('.itemMyMod');

// 	// currentPointofInterest = poiRes.results[poiVal];

// 	modal.classList.remove('hidden');
// 	let iframeMod = document.querySelector('.iframeMod');

// 	iframeMod.setAttribute('src', `${itemMyMod.innerText}`);

// 	modal.addEventListener('click', function(e) {
// 		if (e.target !== modal && e.target !== sum) return;
// 		modal.classList.add('hidden');
// 	});
// 	e.preventDefault();
// });

function loadLocationList() {
	const myLocationList = document.querySelector('#myLocationList');
	const myLocationNames = document.querySelectorAll('.myLocationName');
	// const myLocationCat = document.querySelector('.single-category');
	// const catWrap = document.createElement('div');
	// const outerDiv = document.createElement('div');
	let innerDiv;

	// catWrap.innerHTML = myLocationCat.innerHTML;
	// if (myLocationName) {
	// myLocationList.appendChild(catWrap);
	// for (let i = 0; i < myLocationName.length; i++) {
	for (const myLocationName of myLocationNames) {
		const div = document.createElement('div');
		innerDiv = myLocationList.appendChild(div);
		const myLocationNameTemp = () => {
			return ` 
			${myLocationName.innerText}
			`;
		};
		// forEach (myLocationNames, myLocationName) {
		innerDiv.append(myLocationNameTemp());
		// console.log(myLocationNameTemp());
	}
	// outerDiv.appendChild(innerDiv);
	// if (myLocationList.hasChildNodes()) {
	// 	const myLocHeading = document.createElement('h1');

	// 	myLocHeading.id = 'myLocHeading';
	// 	myLocHeading.innerText = 'My Saved Itineraries';
	// 	console.log(myLocHeading);
	// 	myLocationList.appendChild(outerDiv);
	// 	myLocationList.insertBefore(myLocHeading, outerDiv);
	// }
	return myLocationList;
}
