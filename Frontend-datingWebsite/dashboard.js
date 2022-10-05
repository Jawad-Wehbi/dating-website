const homeBlock = document.querySelector('.home');
const favoritesBlock = document.querySelector('.favorites');
const favoritesLink = document.querySelector('.favoritesLink');
const homeLink = document.querySelector('.homeLink');


favoritesLink.addEventListener('click', () => {
	homeBlock.classList.add('display');
	favoritesBlock.classList.remove('display');
});

homeLink.addEventListener('click', () => {
	homeBlock.classList.remove('display');
	favoritesBlock.classList.add('display');
});