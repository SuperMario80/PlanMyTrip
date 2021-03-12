// UTILITY FUNCTIONS

//DELAY FOR AUTOCOMPLETE WHILE TYPING IN SEARCH FIELD
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

//CREATES DYNAMIC HTML FOR SEARCH RESULTS
const CreateDomElement = function() {
	function createItem(element, className) {
		let item = document.createElement(element);
		item.className = className;
		return item;
	}

	function createLink(element, href = '', innerText) {
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

	return {
		createItem,
		createLink,
		addButton,
		createBtn
	};
};

//ADD CLASS TO ELEMENT DEPENDING ON VALUE OF INNER TEXT
function displayLocType(attribute, targetEl) {
	let addAtrribute = attribute.innerText.toLowerCase();
	targetEl.classList += ` ${addAtrribute}`;

	return addAtrribute;
}

//REGEX TO REMOVE STRINGS
function removeChars(str) {
	let newStr = str.replace(/^.{2,2}_/g, ' ').replace(/_/g, ' ').replace(/,/g, ' ').replace(/\d{1,2}_/g, ' ');
	return newStr;
}
