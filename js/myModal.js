const modal = document.querySelector('.modal');

showSavedModal();
showModal();

function showModal() {
	savePoi.addEventListener('click', function(e) {
		// console.log(itemMap);
		const modalVal = e.target.getAttribute('data-modal');

		currentPointofInterest = poiRes.results[modalVal];

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
		hideModal();
	});
}

function showSavedModal() {
	const savedItemMap = document.querySelectorAll('.savedItemMap');
	const myModalLink = document.querySelectorAll('.myModalLink');
	for (let i = 0; i < savedItemMap.length; i++) {
		console.log(savedItemMap[i]);
		console.log(myModalLink[i]);
		savedItemMap[i].addEventListener('click', function(e) {
			if (e.target.hasAttribute('data-poi')) {
				modal.classList.remove('hidden');
				let iframeMod = document.querySelector('.iframeMod');

				iframeMod.setAttribute('src', `${myModalLink[i].innerText}`);
			}
			hideModal();
			// modal.addEventListener('click', function(e) {
			// 	if (e.target !== modal && e.target !== sum) return;
			// 	// modalBody.innerHTML = '';
			// 	modal.classList.add('hidden');
			// });
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

// {
/* <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=12.841987609863283%2C52.358828590091186%2C13.128662109375002%2C52.451197283310165&amp;layer=mapnik" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/#map=13/52.4050/12.9853">Größere Karte anzeigen</a></small> */
// }
