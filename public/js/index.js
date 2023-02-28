// Sélectionner tous les éléments dont l'id commence par "draggable_img_"
const draggableImgs = document.querySelectorAll('[id^="draggable_img_"]');

// Attacher la fonction "dragElement" à chaque élément sélectionné
draggableImgs.forEach(draggableImg => {
    dragElement(draggableImg);
});

// Fonction pour activer le drag & drop sur l'élément
function dragElement(elmnt) {
    // Initialiser les positions de la souris
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    // Recuperer l'ancien position de l'element
    let epos1 = parseInt(elmnt.top),epos2 = parseInt(elmnt.left);
    // Désactiver la sélection de l'élément
    elmnt.style.userSelect = 'none';
    elmnt.style.webkitUserSelect = 'none';
    elmnt.style.mozUserSelect = 'none';
    elmnt.style.msUserSelect = 'none';

    // Attacher la fonction "dragMouseDown" à l'événement "mousedown"
    elmnt.onmousedown = dragMouseDown;

    // Fonction appelée lorsque l'utilisateur clique sur l'élément
    function dragMouseDown(e) {
        // Empêcher le comportement par défaut du drag & drop
        e.preventDefault();

        // Récupérer la position de la souris
        pos3 = e.clientX;
        pos4 = e.clientY;

        // Ajouter la classe "moving" à l'élément pour indiquer qu'il est en train d'être déplacé
        elmnt.classList.add("moving");

        // Attacher la fonction "closeDragElement" à l'événement "mouseup"
        document.onmouseup = closeDragElement;

        // Attacher la fonction "elementDrag" à l'événement "mousemove"
        document.onmousemove = elementDrag;
    }

    // Fonction appelée lorsque l'utilisateur déplace la souris après avoir cliqué sur l'élément
    function elementDrag(e) {
        // Empêcher le comportement par défaut du drag & drop
        e.preventDefault();

        // Calculer la distance parcourue par la souris depuis la dernière position enregistrée
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;

        // Déplacer l'élément en fonction de la distance parcourue par la souris
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    // Fonction appelée lorsque l'utilisateur relâche le clic de la souris
    function closeDragElement() {
        // Retirer la classe "moving" de l'élément
        elmnt.classList.remove("moving");

        // Détacher la fonction "closeDragElement" de l'événement "mouseup"
        document.onmouseup = null;

        // Détacher la fonction "elementDrag" de l'événement "mousemove"
        document.onmousemove = null;
    }
}
