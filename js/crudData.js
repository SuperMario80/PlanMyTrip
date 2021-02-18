// function delConfirmation(confirmText) {
// 	let e;
// 	if (confirm(confirmText) === true) {
// 		return true;
// 	} else {
// 		e.preventDefault();
// 	}
// }
// console.log(deleteMyLoc);

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
			// confirm('This deletes ALL records attached to this Location');
			// console.log(popup);
		});
	}

	if (deleteMyPoi) {
		deleteMyPoi.addEventListener('click', function(e) {
			if (confirm('Are you sure?') === true) {
				return true;
			} else {
				e.preventDefault();
			}
			// console.log(deleteMyPoi);
			// confirm('Are you sure?');
			// console.log(confirm);
		});
	}
}

deleteMyData();

// function deleteMyData() {
// 	const deleteMyPoi = document.querySelector('#deleteMyPoi');
// 	const deleteMyLoc = document.querySelector('#deleteMyLoc');
// 	console.log(deleteMyLoc);

// 	if (deleteMyPoi) {
// 		deleteMyPoi.addEventListener('click', delConfirmation('Are you sure?'));
// 	}
// 	if (deleteMyLoc) {
// 		deleteMyLoc.addEventListener('click', delConfirmation('This deletes ALL records attached to this Location'));

// 		// This deletes ALL records attached to this Location
// 	}
// }

// deleteMyData();
