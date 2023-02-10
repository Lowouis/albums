document.querySelectorAll('[id^="draggable_img_"]').forEach(draggableImg => {
    dragElement(draggableImg);
});

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    elmnt.style.userSelect = 'none'; // disable selection of the element
    elmnt.style.webkitUserSelect = 'none';
    elmnt.style.mozUserSelect = 'none';
    elmnt.style.msUserSelect = 'none';

    elmnt.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e.preventDefault(); // prevent default drag behavior

        pos3 = e.clientX;
        pos4 = e.clientY;
        elmnt.classList.add("moving");
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e.preventDefault();

        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;

        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
    }

    function closeDragElement() {
        elmnt.classList.remove("moving");
        document.onmouseup = null;
        document.onmousemove = null;
    }
}
