<?php

require_once('model/DbManager.php');

class CommentsManager {

    private $_db;

    public function __construct() {
        $this->_db = DbManager::dbConnect();
    }

    // public function add(Comment $comment) {
    //     $req = $this->_db->prepare('INSERT INTO comments(postId, author, commentDate, content) VALUES (:postId, :author, NOW(), :content)');

    //     $req->execute(array(
    //         'postId' => strip_tags($comment->postId()),
    //         'author' => strip_tags($comment->author()),
    //         'content' => strip_tags($comment->content())
    //     ));
    // }

    public function add($postId, $author, $content) {
        $req = $this->_db->prepare('INSERT INTO comments(postId, author, commentDate, content) VALUES (:postId, :author, NOW(), :content)');

        $req->execute(array(
            'postId' => $postId,
            'author' => $author,
            'content' => $content
        ));
    }

    public function getComments($postId) {
        $req = $this->_db->prepare('SELECT id, author, DATE_FORMAT(commentDate, \'%d/%m/%Y\') AS commentDateFr, content FROM comments WHERE postId = ? ORDER BY commentDate DESC');
        $req->execute(array($postId));

        $comments = [];

        while ($data = $req->fetch()) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function reportComment($commentId) {
        $req = $this->_db->prepare('UPDATE comments set reportings = reportings + 1 WHERE id = ?');
        $req->execute(array($commentId));
    }

    public function getReportedComments() {
        $req = $this->_db->prepare('SELECT id, author, DATE_FORMAT(commentDate, \'%d/%m/%Y\') AS commentDateFr, content, postId, reportings FROM comments WHERE reportings >= 5 ORDER BY reportings DESC');
        $req->execute();

        $reportedComments = [];

        while ($data = $req->fetch()) {
            $reportedComments[] = new Comment($data);
        }

        return $reportedComments;
    }

    // public function update(Comment $comment) {
    //     $req = $this->_db->prepare('UPDATE comments SET author = :author, content = :content WHERE id = :id');

    //     $req->execute(array(
    //         'id' => $comment->id(),
    //         'author' => $comment->author(),
    //         'content' => $comment->content()
    //     ));
    // }

    public function delete($commentId) {
        $req = $this->_db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array ($commentId));
    }

    public function deleteAllCommentsForOnePost($postId) {
        $req = $this->_db->prepare('DELETE FROM comments WHERE postId = ?');
        $req->execute(array($postId));
    }
}