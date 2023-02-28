document.querySelectorAll('[id^="draggable_img_"]').forEach(draggableImg => {
    dragElement(draggableImg);
});

function dragElement(elmnt) {
    let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    let originalOffsetTop = 0, originalOffsetLeft = 0;
    elmnt.style.userSelect = 'none'; // désactiver la sélection de l'élément
    elmnt.style.webkitUserSelect = 'none';
    elmnt.style.mozUserSelect = 'none';
    elmnt.style.msUserSelect = 'none';
    elmnt.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e.preventDefault(); // empêcher le comportement de glisser par défaut
        pos3 = e.clientX;
        pos4 = e.clientY;
        elmnt.classList.add("moving");
        const clone = elmnt.cloneNode(true); // créer une copie de l'élément
        clone.classList.add('copyDraggable'); // ajouter une classe pour afficher la copie
        document.body.appendChild(clone); // ajouter la copie au corps du document
        clone.style.position = "absolute"; // changer la position de la copie à "absolute"
        clone.style.zIndex = "9999"; // mettre la copie en avant-plan
        originalOffsetTop = elmnt.offsetTop; // stocker la position initiale de l'élément
        originalOffsetLeft = elmnt.offsetLeft; // stocker la position initiale de l'élément
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e){
        e.preventDefault();

        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;

        const clone = document.querySelector('.copyDraggable'); // récupérer la copie de l'élément
        clone.style.top = (originalOffsetTop - pos2) + "px"; // calculer la nouvelle position de la copie
        clone.style.left = (originalOffsetLeft - pos1) + "px"; // calculer la nouvelle position de la copie
    }

    function closeDragElement() {
        elmnt.classList.remove("moving");
        const clone = document.querySelector('.dragging'); // récupérer la copie de l'élément
        clone.parentNode.removeChild(clone); // supprimer la copie du document
        document.onmouseup = null;
        document.onmousemove = null;
    }
}
