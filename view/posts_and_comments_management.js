var successMsg = document.getElementById('success-msg');
var deletingBtn = document.getElementById('deleting-btn');
var updatingBtn = document.getElementById('updating-btn');
// var trElts = document.getElementsByTagName('tr');

function displayMsg(msg) {
    msg.style.display = 'visible';
    msg.style.position = 'relative';
    msg.style.left = '35%';

    // tr.style.transition = 'all 2s ease-in';
}


deletingBtn.addEventListener('click', displayMsg(successMsg));

updatingBtn.addEventListener('click', displayMsg(successMsg));

