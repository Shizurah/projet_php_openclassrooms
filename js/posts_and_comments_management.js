var successMsg = document.getElementById('success-msg');
var deletingBtn = document.getElementById('deleting-btn');
var updatingBtn = document.getElementById('updating-btn');

function displayMsg(msg) {
    msg.style.display = 'visible';
    msg.style.position = 'relative';
}

deletingBtn.addEventListener('click', displayMsg(successMsg));
updatingBtn.addEventListener('click', displayMsg(successMsg));

var successMsgForDeletingComment = document.getElementById('success-msg-for-deleting-comment');
var deletingCommentLink = document.getElementById('deleting-comment-link');

deletingCommentLink.addEventListener('click', displayMsg(successMsgForDeletingComment));