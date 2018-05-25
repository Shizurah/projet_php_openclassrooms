var writingCommentBtn = document.getElementById('writing-comment-btn');
var sendingComentBtn = document.getElementById('sending-comment-btn');

writingCommentBtn.addEventListener('click', function() {
    writingCommentBtn.style.display = 'none';
    document.getElementById('comment-form').style.display = 'block';
});