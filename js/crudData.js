const deleteMyLoc = document.querySelector('#deleteMyLoc');
const deleteMyPoi = document.querySelector('#deleteMyPoi');

deleteMyPoi.addEventListener('click', function() {
	console.log(deleteMyPoi);
	let popup = confirm('Are you sure?');
	console.log(popup);
});

deleteMyLoc.addEventListener('click', function() {
	let popup = confirm('This deletes ALL records attached to this Location');
	console.log(popup);
});
console.log(deleteMyPoi);
