const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// // login.js
// document.getElementById('login-form').addEventListener('submit', function(event) {
// 	event.preventDefault(); // Prevent default form submission
// 	// Perform any necessary login actions
// 	window.location.href = 'dashboard.html'; // Redirect to the dashboard page
// });

// document.getElementById('signup-form').addEventListener('submit', function(event) {
// 	event.preventDefault(); // Prevent default form submission
// 	// Perform any necessary signup actions
// 	window.location.href = 'dashboard.html'; // Redirect to the dashboard page
// });
