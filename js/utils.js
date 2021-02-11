function debounce(func, delay = 1000) {
	let timeoutId;
	return (...args) => {
		if (timeoutId) {
			clearTimeout(timeoutId);
		}
		timeoutId = setTimeout(() => {
			func.apply(null, args);
		}, delay);
	};
}

function createItem(element, className) {
	let item = document.createElement(element);
	item.className = className;

	return item;
}

function createLink(element, href, innerText) {
	let link = document.createElement(element);
	link.setAttribute('href', href);
	link.setAttribute('target', '_blank');
	link.innerText = innerText;

	return link;
}

function addButton() {
	let logout = document.querySelector('#logout');
	if (logout) {
		return logout;
	}
	// else {
	// 	console.log('please login');
	// }
}

function createBtn(element, classEl, id, value, innerText) {
	let btn = document.createElement(element);
	btn.className = classEl;
	btn.id = id;
	btn.setAttribute('type', 'button');
	btn.setAttribute('value', value);
	btn.innerText = innerText;

	return btn;
}

function displayLocType(locType, wrap) {
	// let wrap = document.querySelector('.single-wrap');
	// let locType = document.querySelector('.single-category');
	if (locType.innerText.toLowerCase() === 'country') {
		wrap.className = 'single-wrap country';
	}
	if (locType.innerText.toLowerCase() === 'national park') {
		wrap.className = 'single-wrap np';
	}
	if (locType.innerText.toLowerCase() === 'region') {
		wrap.className = 'single-wrap region';
	}
	if (locType.innerText.toLowerCase() === 'city') {
		wrap.className = 'single-wrap city';
	}
	return wrap;
}

function removeChars(str) {
	let newStr = str.replace(/^.{2,2}_/g, ' ').replace(/_/g, ' ').replace(/,/g, ' ').replace(/\d{1,2}_/g, ' ');
	return newStr;
}

function loadLocationList() {
	const myLocationList = document.querySelector('.myLocationList');
	let myLocationNames = document.querySelectorAll('.myLocationName');

	// if (myLocationName) {
	// for (let i = 0; i < myLocationName.length; i++) {
	for (const myLocationName of myLocationNames) {
		const div = document.createElement('div');
		const innerDiv = myLocationList.appendChild(div);
		const myLocationNameTemp = () => {
			return ` 
		${myLocationName.innerHTML}
		 `;
		};
		// forEach (myLocationNames, myLocationName) {
		innerDiv.append(myLocationNameTemp());
		console.log(myLocationNameTemp());
	}
	return myLocationList;
}

// let removeChars = (char) => {
// 	return char.replace(/_/g, ' ');
// };

// test redirect when saved

// let saveMyLoc = document.querySelector('#saveMyLoc');
// saveMyLoc.addEventListener('click', (e) => {
// 	e.target.replace('travellerArea.php');
// 	// return saveThis;
// });
