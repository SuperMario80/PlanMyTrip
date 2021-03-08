// expandAll();
// function expandAll() {
// 	const expandLocBtn = document.querySelectorAll('.collapsible');
// 	const expandAll = document.querySelector('#expandAll');
// 	const expandLoc = document.querySelectorAll('.expandLoc');
// 	console.log(expandLoc);
// 	const plusFa = document.querySelectorAll('.fa-plus');

// 	expandAll.addEventListener('click', function() {
// 		expandLoc.forEach(function(el) {
// 			// if (el.classList === 'expandLoc wrap hidden') {
// 			console.log(el.className);
// 			el.classList.remove('hidden');
// 			console.log(el.previousElementSibling.childNodes[1].firstChild);
// 			let plusFa = el.previousElementSibling.childNodes[1].firstChild.firstChild.classList;
// 			plusFa.className = 'fas fa-minus fa-xs';

// 			console.log(plusFa);
// 			// 	// expandLocBtn[i].classList.add('open');
// 			// 	// expandLoc[i].nextElementSibling.classList.remove('hidden');
// 			// 	// changeColorTheme();
// 			// 	// showSavedModal();
// 			// } else {
// 			// 	el.classList.add('hidden');
// 			// 	// plusFa[i].classList = 'fas fa-plus fa-xs';
// 			// 	// expandLoc[i].nextElementSibling.classList.add('hidden');
// 			// 	// expandLocBtn[i].classList.remove('open');
// 			// }

// 			// plusFa.classList = 'fas fa-minus fa-xs';
// 			// expandLocBtn.classList.add('open');
// 			// expandLoc.nextElementSibling.classList.remove('hidden');
// 		});
// 		// if (expandLoc.classList === 'expandLoc wrap hidden') {
// 		// 	expandLoc.classList.remove('hidden');
// 		// 	plusFa.classList = 'fas fa-minus fa-xs';
// 		// 	expandLocBtn.classList.add('open');
// 		// 	expandLoc.nextElementSibling.classList.remove('hidden');
// 		// } else {
// 		// 	expandLoc.classList.add('hidden');
// 		// 	plusFa.classList = 'fas fa-plus fa-xs';
// 		// 	expandLoc.nextElementSibling.classList.add('hidden');
// 		// 	expandLocBtn.classList.remove('open');
// 		// }
// 	});
// }

(function expandLocation() {
	const expandLocBtn = document.querySelectorAll('.collapsible');

	const expandLoc = document.querySelectorAll('.expandLoc');
	const plusFa = document.querySelectorAll('.fa-plus');

	for (let i = 0; i < expandLocBtn.length; i++) {
		expandLocBtn[i].addEventListener('click', function(e) {
			if (
				e.target.hasAttribute('data-expand') ||
				e.target.parentElement.parentElement.hasAttribute('data-expand')
			) {
				if (expandLoc[i].className === 'expandLoc wrap hidden') {
					expandLoc[i].classList.remove('hidden');
					plusFa[i].classList = 'fas fa-minus fa-xs';
					expandLocBtn[i].classList.add('open');
					expandLoc[i].nextElementSibling.classList.remove('hidden');
					changeColorTheme();
					showSavedModal();
				} else {
					expandLoc[i].classList.add('hidden');
					plusFa[i].classList = 'fas fa-plus fa-xs';
					expandLoc[i].nextElementSibling.classList.add('hidden');
					expandLocBtn[i].classList.remove('open');
				}
			}
		});
	}

	// changeColorTheme();
	// showSavedModal();
	deleteMyData();
})();

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
