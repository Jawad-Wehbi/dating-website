const signinBlock = document.querySelector('.signin-block');
const signupBlock = document.querySelector('.signup-block');
const signupLink = document.querySelector('.signup-link');
const signupBack = document.querySelector('.signup-back');

signupLink.addEventListener('click', () => {
	signinBlock.classList.add('display');
	signupBlock.classList.remove('display');
});
signupBack.addEventListener('click', () => {
	signinBlock.classList.remove('display');
	signupBlock.classList.add('display');
});