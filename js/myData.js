function changeColorTheme() {
	const singleCategory = document.querySelectorAll('.single-category.location');
	const singleWrap = document.querySelectorAll('.single-wrap.location');
	// console.log(singleCategory);
	for (let i = 0; i < singleCategory.length; i++) {
		// console.log('hello');
		displayLocType(singleCategory[i], singleWrap[i]);
	}
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
		expandLocBtn[i].firstElementChild.addEventListener('click', function(e) {
			console.log('hello');
			if (e.target.parentElement.parentElement.hasAttribute('data-expand')) {
				if (expandLoc[i].className === 'expandLoc wrap hidden') {
					expandLoc[i].classList.remove('hidden');
					// minusFa[i].classList.remove('hidden');
					plusFa[i].classList = 'fas fa-minus';
					expandLocBtn[i].classList.add('active');
					expandLoc[i].nextElementSibling.classList.remove('hidden');
					// console.log((expandLocBtn[i].style.display = 'block'));
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
	changeColorTheme();
}
