// loadLocationList();
// function loadLocationList() {
// 	const myLocationList = document.querySelector('#myLocationList');

// 	if (myLocationList) {
// 		const myLocationNames = document.querySelectorAll('.myLocationName');
// 		const myLocContainer = document.createElement('div');
// 		myLocContainer.className = 'container py-3';
// 		myLocationList.appendChild(myLocContainer);

// 		const scrollIds = document.querySelectorAll('.wrap');
// 		const LocCategory = document.querySelectorAll('.single-category.location');

// 		// for (const myLocationName of myLocationNames) {
// 		for (let i = 0; i < myLocationNames.length; i++) {
// 			const div1 = document.createElement('div');
// 			const div2 = document.createElement('div');
// 			let a;

// 			// for (const scrollId of scrollIds) {
// 			// let innerDiv;
// 			a = document.createElement('a');
// 			a.setAttribute('href', `#${scrollIds[i].getAttribute('id')}`);
// 			myLocContainer.appendChild(a);
// 			// }
// 			a.appendChild(div1);
// 			a.appendChild(div2);
// 			// const myLocationCategoryTemp = () => {
// 			// 	return LocCategory[i].innerText;
// 			// };
// 			// const myLocationNameTemp = () => {
// 			// 	return myLocationNames[i].innerText;
// 			// };

// 			// div1.append(LocCategory[i].innerText.toLowerCase());
// 			div1.append(LocCategory[i].innerText);
// 			div2.append(myLocationNames[i].innerText);
// 		}
// 	}
// 	// e.preventDefault();

// 	// return myLocationList;
// }
// changeColorTheme();
function changeColorTheme() {
	const singleWrap = document.querySelectorAll('.single-wrap');
	const singleCategory = document.querySelectorAll('.single-category location');
	for (let i = 0; i >= singleWrap.length; i++) {
		console.log(singleCategory[i]);
		displayLocType(singleCategory[i], singleWrap[i], 'single-wrap');
	}
	return;
}

expandLocation();
function expandLocation() {
	const expandLocBtn = document.querySelectorAll('.collapsible');
	const expandLoc = document.querySelectorAll('.expandLoc');
	const plusFa = document.querySelectorAll('.fa-plus');
	// const minusFa = document.querySelectorAll('.fa-minus');
	for (let i = 0; i < expandLocBtn.length; i++) {
		// console.log(expandLocBtn[i]);
		// console.log(expandLoc[i]);
		expandLocBtn[i].addEventListener('click', function(e) {
			console.log('hello');
			if (e.target.hasAttribute('data-expand')) {
				if (expandLoc[i].className === 'expandLoc wrap hidden') {
					expandLoc[i].classList.remove('hidden');
					// minusFa[i].classList.remove('hidden');
					plusFa[i].classList = 'fas fa-minus';
					expandLocBtn[i].classList.add('active');
					expandLoc[i].nextElementSibling.classList.remove('hidden');
					// expandLoc[i].classList.add('active');
				} else {
					expandLoc[i].classList.add('hidden');
					// minusFa[i].classList.add('hidden');
					plusFa[i].classList = 'fas fa-plus';
					expandLoc[i].nextElementSibling.classList.add('hidden');
					expandLocBtn[i].classList.remove('active');
					// expandLoc[i].classList.remove('active');
					// console.log(expandLoc[i]);
				}
			}
			// console.log(expandLoc[i]);
		});
	}
}
