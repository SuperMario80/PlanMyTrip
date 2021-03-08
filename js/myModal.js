const modal = document.querySelector('.modal');

function showModal() {
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

function showSavedModal() {
	const savedItemMap = document.querySelectorAll('.savedItemMap');
	const myModalLink = document.querySelectorAll('.myModalLink');
	for (let i = 0; i < savedItemMap.length; i++) {
		savedItemMap[i].addEventListener('click', function(e) {
			if (e.target.hasAttribute('data-poi')) {
				modal.classList.remove('hidden');
				let iframeMod = document.querySelector('.iframeMod');

				iframeMod.setAttribute('src', `${myModalLink[i].innerText}`);
			}
			hideModal();
		});
	}
}

function hideModal() {
	const sum = modal.querySelector('.summary');
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== sum) return;
		// modalBody.innerHTML = '';
		modal.classList.add('hidden');
	});
}
