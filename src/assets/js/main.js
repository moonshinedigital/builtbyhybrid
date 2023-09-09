/**
 * The JavaScript code you place here will be processed by esbuild, and the
 * output file will be created at `../theme/js/main.min.js` and enqueued by
 * default in `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

/* eslint-disable no-undef */

// Function to toggle the mobile menu state
function menuToggle() {
	const mobileMenu = document.getElementById('mobile-menu');
	const openButton = document.getElementById('btn-open');
	const closeButton = document.getElementById('btn-close');

	// Add event listener for the open button
	openButton.addEventListener('click', function () {
		mobileMenu.setAttribute('data-menu', 'active');
	});

	// Add event listener for the close button
	closeButton.addEventListener('click', function () {
		mobileMenu.setAttribute('data-menu', 'inactive');
	});

	// Flicker fix. Removes the inline styles once CSS is fully loaded
	window.onload = function () {
		mobileMenu.removeAttribute('style');
		// mobileMenu.style.display = '';
	};
}

// Wait for the DOM content to be fully loaded
document.addEventListener('DOMContentLoaded', menuToggle);
