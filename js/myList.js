(function expandLocation() {
	const expandAll = document.querySelector('#expandAll');
	const expandLocBtn = document.querySelectorAll('.collapsible');

	const expandLoc = document.querySelectorAll('.expandLoc');
	const plusFa = document.querySelectorAll('.fa-plus');

	for (let i = 0; i < expandLocBtn.length; i++) {
		expandLocBtn[i].addEventListener('click', function(e) {
			if (
				e.target.hasAttribute('data-expand') ||
				e.target.parentElement.parentElement.hasAttribute('data-expand')
			) {
				expandLoc[i].classList.toggle('hidden');
				expandLocBtn[i].classList.toggle('open');
				expandLoc[i].nextElementSibling.classList.toggle('hidden');

				if (expandLoc[i].className === 'expandLoc wrap hidden') {
					plusFa[i].classList = 'fas fa-plus fa-xs';
				} else {
					plusFa[i].classList = 'fas fa-minus fa-xs';
				}
			}
		});
	}
	expandAll.addEventListener('click', function() {
		if (expandAll.innerText === 'Click To Expand') {
			for (let i = 0; i < expandLoc.length; i++) {
				// if (expandLoc[i].classList === 'expandLoc wrap hidden') {
				// console.log(expandLoc);
				// console.log(expandLoc[i]);
				// console.log(expandLoc[i].classList);
				// if (expandLoc[i].className !== 'expandLoc wrap hidden') {
				expandLoc[i].classList.remove('hidden');
				plusFa[i].classList = 'fas fa-minus fa-xs';
				expandLocBtn[i].classList.add('open');
				if (expandLoc[i].nextElementSibling.className === 'hidden') {
					expandLoc[i].nextElementSibling.classList.remove('hidden');
				}
				// console.log(expandLoc[i].nextElementSibling.classList);
				expandAll.innerText = 'Click To Collapse';
				// }
			}
		} else {
			for (let i = 0; i < expandLoc.length; i++) {
				expandLoc[i].classList.add('hidden');
				plusFa[i].classList = 'fas fa-plus fa-xs';
				expandLoc[i].nextElementSibling.classList.add('hidden');
				expandLocBtn[i].classList.remove('open');
				expandAll.innerText = 'Click To Expand';
			}
		}
	});

	changeColorTheme();
	showSavedModal();
	deleteMyData();
	modifyUpdateTempl();
})();

// (function expandAll() {
// 	const expandAll = document.querySelector('#expandAll');
// 	const expandLocBtn = document.querySelectorAll('.collapsible');

// 	const expandLoc = document.querySelectorAll('.expandLoc');
// 	const plusFa = document.querySelectorAll('.fas fa-plus fa-xs');
// 	// console.log(plusFa.classList);

// 	expandAll.addEventListener('click', function() {
// 		expandLoc.forEach(function(expAllLoc) {
// 			if (expAllLoc.className === 'expandLoc wrap hidden') {
// 				// console.log(expAllLoc.className);
// 				expAllLoc.classList.remove('hidden');
// 				expAllLoc.previousElementSibling.firstElementChild.classList.add('open');

// 				let plusFaAll =
// 					expAllLoc.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.classList[1];

// 				// console.log(plusFaAll);
// 				plusFaAll = 'fa-minus';
// 				console.log(plusFaAll);
// 				// plusFa.classList[1].remove('fa-plus');
// 				// console.log(
// 				// 	expAllLoc.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.classList
// 				// );
// 				// console.log(
// 				// 	expAllLoc.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.classList
// 				// );
// 				// console.log(
// 				// 	expAllLoc.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.className.add(
// 				// 		'fa-minus'
// 				// 	)
// 				// );
// 				// plusFa.className = 'fas fa-minus fa-xs';
// 				// expAllLoc.previousElementSibling.firstElementChild.firstElementChild.firstElementChild.previousElementSibling.classList.remove(
// 				// 	'fas fa-minus fa-xs'
// 				// );
// 				// expandAllBtn.classList.add('open');
// 				// expAllLoc.nextElementSibling.classList.remove('hidden');
// 				expandAll.innerText = 'Click To Collapse';
// 			}
// 			// else {
// 			// if ((expandAll.innerText = 'Click To Collapse')) {
// 			// 	expAllLoc.classList.add('hidden');
// 			// 	expAllLoc.previousElementSibling.firstElementChild.classList.remove('open');
// 			// 	// plusFaAll.classList = 'fas fa-plus fa-xs';
// 			// 	// expandAllBtn.classList.remove('open');
// 			// 	// expAllLoc.nextElementSibling.classList.add('hidden');
// 			// 	expandAll.innerText = 'Click To Expand';
// 			// }
// 			// }
// 			// console.log(el.className);

// 			// for (let i = 0; i < expandLoc.length; i++) {
// 			// 	console.log(expandLoc.className);
// 			// 	if (expandLoc.className === 'expandLoc wrap hidden') {
// 			// 		console.log(expandLoc);
// 			// 		// console.log(expandLoc[i].classList);
// 			// 		// if (expandLoc[i].className !== 'expandLoc wrap hidden') {
// 			// 		expandLoc.classList.remove('hidden');
// 			// 		plusFa.classList = 'fas fa-minus fa-xs';
// 			// 		expandLocBtn.classList.add('open');
// 			// 		expandLoc.nextElementSibling.classList.remove('hidden');
// 			// 		expandAll.innerText = 'Click To Collapse';
// 			// 		// }
// 			// 		console.log(expandLoc);
// 			// 	} else {
// 			// 		if (expandLoc.className === 'expandLoc wrap') {
// 			// 			expandLoc.classList.add('hidden');
// 			// 			plusFa.classList = 'fas fa-plus fa-xs';
// 			// 			expandLoc.nextElementSibling.classList.add('hidden');
// 			// 			expandLocBtn.classList.remove('open');
// 			// 			expandAll.innerText = 'Click To Expand';
// 			// 		}
// 			// 	}
// 			// }
// 		});
// 	});
// })();

function changeColorTheme() {
	const locClassification = document.querySelectorAll('.loc-classification');
	const locHead = document.querySelectorAll('.single-headline.location');
	for (let i = 0; i < locClassification.length; i++) {
		displayLocType(locClassification[i], locHead[i]);
	}
}

function deleteMyData() {
	const deleteMyLoc = document.querySelector('#deleteMyLoc');
	const deleteMyPoi = document.querySelector('#deleteMyPoi');

	if (deleteMyLoc) {
		deleteMyLoc.addEventListener('click', function(e) {
			if (confirm('This deletes ALL records attached to this Location') === true) {
				return true;
			} else {
				e.preventDefault();
			}
		});
	}

	if (deleteMyPoi) {
		deleteMyPoi.addEventListener('click', function(e) {
			if (confirm('Are you sure?') === true) {
				return true;
			} else {
				e.preventDefault();
			}
		});
	}
}

function modifyUpdateTempl() {
	const id = document.querySelector('input[name=id]');

	const locName = document.querySelector(`input[name=location`);
	const poiName = document.querySelector(`input[name=poiName`);

	if (id && id.value !== '0') {
		if (locName) {
			const classification = document.querySelector('input[name=classification]');
			console.log(id.value);
			classification.setAttribute('readonly', '');
			locName.setAttribute('readonly', '');
		}
		if (poiName) {
			poiName.setAttribute('readonly', '');
		}
	}
}
