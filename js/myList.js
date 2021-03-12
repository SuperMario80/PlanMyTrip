//IMMEDIATELY INVOKED FUNCTION EXPRESSION TO EXPAND/COLAPSE LIST IN SHOWMYTRIP
(function expandLocation() {
	//DOM ELEMENTS
	const expandAll = document.querySelector('#expandAll');

	const expandLocBtn = document.querySelectorAll('.collapsible');
	const expandLoc = document.querySelectorAll('.expandLoc');
	const plusFa = document.querySelectorAll('.fa-plus');

	if (expandAll) {
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
					if (expandLoc[i].classList.contains('hidden')) {
						expandLoc[i].classList.remove('hidden');
						plusFa[i].classList = 'fas fa-minus fa-xs';
						expandLocBtn[i].classList.add('open');

						if (expandLoc[i].nextElementSibling) {
							expandLoc[i].nextElementSibling.classList.remove('hidden');
						}
					}

					expandAll.innerText = 'Click To Collapse';
				}
			} else {
				for (let i = 0; i < expandLoc.length; i++) {
					expandLoc[i].classList.add('hidden');
					plusFa[i].classList = 'fas fa-plus fa-xs';
					if (expandLoc[i].nextElementSibling) {
						expandLoc[i].nextElementSibling.classList.add('hidden');
					}
					expandLocBtn[i].classList.remove('open');
					expandAll.innerText = 'Click To Expand';
				}
			}
		});

		changeColorTheme();
		showSavedModal();
	}

	deleteMyData();
	modifyUpdateTempl();
})();

//CHANGE BACKGROUND COLOR IN SHOWMYTRIP
function changeColorTheme() {
	//DOM ELEMENTS
	const locClassification = document.querySelectorAll('.loc-classification');
	const locHead = document.querySelectorAll('.single-headline.location');
	for (let i = 0; i < locClassification.length; i++) {
		displayLocType(locClassification[i], locHead[i]);
	}
}

//CONFIRM POPUP TO DELETE DATA
function deleteMyData() {
	//DOM ELEMENTS
	const deleteMyLoc = document.querySelector('#deleteMyLoc');
	const deleteMyPoi = document.querySelector('#deleteMyPoi');

	if (deleteMyLoc) {
		deleteMyLoc.addEventListener('click', function(e) {
			if (confirm('This affects ALL attached POI`s') === true) {
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

// SETS INPUT FIELDS TO READONLY
function modifyUpdateTempl() {
	//DOM ELEMENTS
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
