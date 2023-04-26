document.querySelector('.open-menu').addEventListener('click', function () {
	document.querySelector('.top-nav').style.display = 'block';
});

document.querySelector('.close-menu').addEventListener('click', function () {
	document.querySelector('.top-nav').style.display = 'none';
});

let prevBtn = document.querySelector('.nav-links > .prev');

// if (prevBtn) {
// 	console.log('prevBtn');
// 	prevBtn.innerHTML =
// 		'<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M231.293 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L70.393 256 251.092 74.87c4.686-4.686 4.686-12.284 0-16.971L231.293 38.1c-4.686-4.686-12.284-4.686-16.971 0L4.908 247.515c-4.686 4.686-4.686 12.284 0 16.971L214.322 473.9c4.687 4.686 12.285 4.686 16.971-.001z"></path></svg>';
// }

// let ne = document.querySelector('.nav-links > .prev');

// if (prevBtn) {
// 	console.log('prevBtn');
// 	prevBtn.innerHTML =
// 		'<svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M231.293 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L70.393 256 251.092 74.87c4.686-4.686 4.686-12.284 0-16.971L231.293 38.1c-4.686-4.686-12.284-4.686-16.971 0L4.908 247.515c-4.686 4.686-4.686 12.284 0 16.971L214.322 473.9c4.687 4.686 12.285 4.686 16.971-.001z"></path></svg>';
// }
