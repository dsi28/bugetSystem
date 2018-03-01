/*jslint devel: true */
// Get the modal
var modal = document.getElementById('id01');
var sicount = 0; // if == 1 then modal is currently being displayed. if == 0 modal is not being displayed.
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    "use strict";
    if (event.target === modal) {
        modal.style.display = "none";
        sicount = sicount - 1;
    }
};
var sicount = 0;
document.getElementById('signin').onclick = function () {
    "use strict";
    if (sicount === 0) {
    sicount++;
    modal.style.display = 'block';
    }
};

document.getElementById('closeM').onclick = function () {
    "use strict";
    sicount = sicount - 1;
    modal.style.display = 'none';
};