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


let isFavoriteButton = document.getElementsByClassName('isFavoriteButton');

for (let i = 0; i < isFavoriteButton.length; i++) {
    isFavoriteButton[i].addEventListener('click', addToFavorite);
}

let isFavorite = document.getElementsByName("isFavoriteName");
// isFavorite.addEventListener('click', addToFavorite);

console.log(isFavorite);

for (let i = 0; i < isFavorite.length; i++) {
    isFavorite[i].addEventListener('click', addToFavorite);
}

function addToFavorite(event) {
    event.preventDefault();
    const favoriteLink = event.currentTarget;
    const link = favoriteLink.href;

    try {
        fetch(link)
            // Extract the JSON from the response
            .then(res => res.json())
            // Then update the icon
            .then(data => {
                const favoriteIcon = favoriteLink.firstElementChild;
                if (data.isInFavorite) {
                    favoriteIcon.classList.remove("bi-heart"); // Remove the .bi-heart (empty heart) from classes in <i> element
                    favoriteIcon.classList.add("bi-heart-fill"); // Add the .bi-heart-fill (full heart) from classes in <i> element
                } else {
                    favoriteIcon.classList.remove("bi-heart-fill"); // Remove the .bi-heart-fill (full heart) from classes in <i> element
                    favoriteIcon.classList.add("bi-heart"); // Add the .bi-heart (empty heart) from classes in <i> element
                }
            });
    } catch (err) {
        console.error(err);
    }
}
