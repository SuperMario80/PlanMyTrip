//GOOGLE MAPS MODAL FOR ALL POINTS OF INTEREST

//MODAL FOR SEARCH RESULTS
function showModal() {
	const savePoi = document.querySelector('#poi');
	savePoi.addEventListener('click', function(e) {
		//Acces Key for Google Maps Request
		const mapKey = 'AIzaSyA9h2yTUJQGROM9gtphNHPIt-TVXF9a4mg&q';

		const modalVal = e.target.getAttribute('data-modal');
		currentPointofInterest = poiRes.results[modalVal];

		if (e.target.hasAttribute('data-modal')) {
			createModal(
				'#summary',
				`https://maps.google.com/maps/embed/v1/place?key=${mapKey}=${currentPointofInterest.coordinates
					.latitude},${currentPointofInterest.coordinates.longitude}&zoom=14`
			);
		}
	});
}

//MODAL FOR SAVED DATA IN SHOWMYTRIP
function showSavedModal() {
	const savedItemMap = document.querySelectorAll('.savedItemMap');
	const myModalLink = document.querySelectorAll('.myModalLink');
	for (let i = 0; i < savedItemMap.length; i++) {
		savedItemMap[i].addEventListener('click', function() {
			createModal('.myList', `${myModalLink[i].innerText}`);
		});
	}
}

function createModal(appendModal, googleMap) {
	//TARGETS DOM ELEMENT WHERE MODAL GETS IMPLEMENTED
	const showModal = document.querySelector(appendModal);

	//#1 Creates Modal
	const modal = crEl.createItem('div', 'modal');
	modal.id = 'myModal';
	//#1.1
	const sum = crEl.createItem('div', 'summary');
	//#1.1.1
	const modalBody = crEl.createItem('div', 'modal-body');
	//#1.1.1.1
	const iframeMod = crEl.createItem('iframe', 'iframeMod');
	iframeMod.setAttribute('width', '900vw');
	iframeMod.setAttribute('height', '550vw');
	iframeMod.setAttribute('frameborder', '2');
	iframeMod.setAttribute('style', 'border:0');
	iframeMod.setAttribute('allowfullscreen', '');
	iframeMod.setAttribute('src', googleMap);

	//append Child Elements
	modal.appendChild(sum);
	sum.appendChild(modalBody);
	modalBody.appendChild(iframeMod);
	showModal.append(modal);

	hideModal(modal);
}

function hideModal(modal) {
	const modalSum = modal.querySelector('.summary');
	modal.addEventListener('click', function(e) {
		if (e.target !== modal && e.target !== modalSum) return;
		modal.classList.add('hidden');
	});
}
