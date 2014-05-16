<?php
    require_once("post.php");
    require_once("/home/bradg/tutorconnect/config.php");
    function publishPost()
    {
        $mysqli = Pointer::getMysqli();
        $title = $_POST["title"];
        $title = trim($title);
        $author = $_POST["author"];
        $author = trim($author);
        $text = $_POST["text"];
        $text = trim($text);
        $date = null;
        try
        {
                    $post = new Post(-1, $title, $author, $text, $date);
                    $post->insert($mysqli);
        }
        catch(Exception $exception)
        {
                    echo "<p style='color: red'>There was a problem publishing your post.</p>";
                    return;
        }
        header("location: page.php");
        
    }
    publishPost();
?>