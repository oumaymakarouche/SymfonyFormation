/* Fonction pour ajouter un article au panier */
function addToCart(articleId) {
    // Code pour ajouter le article au panier
    console.log(`article ajouté au panier : ${articleId}`);
}

/* Code pour récupérer tous les boutons "Acheter" et leur ajouter un événement de clic */
const buyButtons = document.querySelectorAll('.buy-button');
buyButtons.forEach(button => {
    button.addEventListener('click', event => {
        const articleId = event.target.dataset.articleId;
        addToCart(articleId);
    });
});
