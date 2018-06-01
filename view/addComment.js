var writtingCommentBtn = document.getElementById('writting-comment-btn');
var sendingCommentBtn = document.getElementById('sending-comment-btn');

writtingCommentBtn.addEventListener('click', function() {
    writtingCommentBtn.style.display = 'none';
    document.getElementById('comment-form').style.display = 'block';
});