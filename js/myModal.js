//GOOGLE MAPS MODAL FOR ALL POINTS OF INTEREST

//GLOBAL VARIABLE
const modal = document.querySelector('.modal');

//MODAL FOR SEARCH RESULTS
function showModal() {
	const savePoi = document.querySelector('#poi');
	savePoi.addEventListener('click', function(e) {
		const mapKey = 'AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q';
		const modalVal = e.target.getAttribute('data-modal');

		currentPointofInterest = poiRes.results[modalVal];

		if (e.target.hasAttribute('data-modal')) {
			modal.classList.remove('hidden');
			let iframeMod = document.querySelector('.iframeMod');
			iframeMod.setAttribute(
				'src',
				`https://maps.google.com/maps/embed/v1/place?key=${mapKey}=${currentPointofInterest.coordinates
					.latitude},${currentPointofInterest.coordinates.longitude}&zoom=14`
			);
		}
		hideModal();
	});
}

//MODAL FOR SAVED DATA
function showSavedModal() {
	const savedItemMap = document.querySelectorAll('.savedItemMap');
	const myModalLink = document.querySelectorAll('.myModalLink');
	for (let i = 0; i < savedItemMap.length; i++) {
		savedItemMap[i].addEventListener(
			'click',
			// clickModal('data-poi', `${myModalLink[i].innerText}`));
			function(e) {
				if (e.target.hasAttribute('data-poi')) {
					modal.classList.remove('hidden');
					let iframeMod = document.querySelector('.iframeMod');

					iframeMod.setAttribute('src', `${myModalLink[i].innerText}`);
				}
				hideModal();
			}
		);
	}
}

// function clickModal(dataAttr, modalLink) {
// 	if (e.target.hasAttribute(dataAttr)) {
// 		modal.classList.remove('hidden');
// 		let iframeMod = document.querySelector('.iframeMod');

// 		iframeMod.setAttribute('src', modalLink);
// 	}
// }

function hideModal() {
	const sum = modal.querySelector('.summary');
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== sum) return;
		// modalBody.innerHTML = '';
		modal.classList.add('hidden');
	});
}
