document.addEventListener('DOMContentLoaded', () => {
    console.log("JS chargé et actif");
});

window.addEventListener('scroll', function() {
    const imageSection = document.querySelector('.image-section');
    const backgroundImage = document.querySelector('.background_img');
    const contentSection = document.querySelector('.content-section');
    
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop; // Position actuelle du défilement
    const imageHeight = imageSection.clientHeight; // Hauteur de la section image

    // Calcule l'opacité de l'image
    let opacity = 1 - (scrollTop / (imageHeight * 0.5)); // L'image disparaît à moitié de sa hauteur
    if (opacity < 0) opacity = 0; // Empêche l'opacité d'aller en dessous de 0

    backgroundImage.style.opacity = opacity;

    // Ajuster le flou du dégradé
    let blurValue = Math.max(0, 20 * (scrollTop / (imageHeight * 0.5))); // Calcule le flou
    imageSection.style.setProperty('--blur-value', `${blurValue}px`);
    
    // Appliquer le flou sur l'élément pseudo
    imageSection.querySelector('::before').style.filter = `blur(${blurValue}px)`;

    // L'apparition du contenu lorsque l'image est à moitié disparue
    if (scrollTop > imageHeight * 0.5) {
        contentSection.style.opacity = 1; // Rend le contenu visible
    } else {
        contentSection.style.opacity = 0; // Cache le contenu si l'image est encore visible
    }
});


let player;

// Fonction appelée lorsque l'API YouTube est prête
function onYouTubeIframeAPIReady() {
    player = new YT.Player('video', {
        events: {
            'onReady': onPlayerReady,
        }
    });
}

// Fonction appelée lorsque le lecteur est prêt
function onPlayerReady(event) {
    const videoElement = document.getElementById('video');
    
    // Ajouter un gestionnaire d'événements au clic sur la vidéo
    videoElement.addEventListener('click', function() {
        player.getIframe().contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    });
}
