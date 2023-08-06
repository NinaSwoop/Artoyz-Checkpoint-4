/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';
require('bootstrap');

// start the Stimulus application
import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';


let isFavoriteButton = document.getElementsByClassName('isfavoritebutton');

for (let i = 0; i < isFavoriteButton.length; i++) {
    isFavoriteButton[i].addEventListener('click', function (event) {
        const toyId = event.currentTarget.getAttribute('data-toy-id');
        addToFavorite(event, toyId);
    });
}
    

function addToFavorite(event, toyId) {
    event.preventDefault();
    const favoriteLink = event.currentTarget;
    const favoriteIcon = favoriteLink.firstElementChild;
    const favoriteTextButton = favoriteLink.lastElementChild;
    const url = `/toys/${toyId}/isfavorite`;


    fetch(url, {
        method: 'POST',
        credentials: 'same-origin',
    })
    .then(res => res.json())
    .then(data => {
        if (data.isInFavorite) {
        console.log(data);
            console.log(data.isInFavorite);
            favoriteLink.setAttribute("aria-pressed", 'true');
            favoriteIcon.classList.remove("bi-balloon-heart");
            favoriteIcon.classList.add("bi-balloon-heart-fill");
            favoriteTextButton.textContent = "Remove to favorite";
        } else {
            favoriteLink.setAttribute("aria-pressed", 'false');
            favoriteIcon.classList.remove("bi-balloon-heart-fill");
            favoriteIcon.classList.add("bi-balloon-heart");
            favoriteTextButton.textContent = "Add to favorite";
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}