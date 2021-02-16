// loadLocationList();

(function loadLocationList() {
	const myLocationList = document.querySelector('#myLocationList');
	const myLocationNames = document.querySelectorAll('.myLocationName');
	const myLocContainer = document.createElement('div');
	myLocContainer.className = 'container py-3';
	myLocationList.appendChild(myLocContainer);

	const scrollIds = document.querySelectorAll('.wrap');

	// for (const myLocationName of myLocationNames) {
	for (let i = 0; i < myLocationNames.length; i++) {
		const div = document.createElement('div');
		let a;

		// for (const scrollId of scrollIds) {
		// let innerDiv;
		a = document.createElement('a');
		a.setAttribute('href', `#${scrollIds[i].getAttribute('id')}`);
		myLocContainer.appendChild(a);
		// }
		a.appendChild(div);
		const myLocationNameTemp = () => {
			return ` 
					${myLocationNames[i].innerText}
					`;
		};
		a.append(myLocationNameTemp());
	}

	// return myLocationList;
})();
