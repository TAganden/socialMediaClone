<?php 
require "includes/connection.php";
session_start();
require "includes/profilePage/header.php";
include "includes/classes/User.php";
include "includes/classes/Post.php";

if (isset($_POST['post_btn'])){
    $post= new Post($con,$_SESSION['username']);
    $post->submitPost($_POST['post_text'],"");
}

?>

<div class="col-md-3" id="profileAside">


    <div class="card">
        <img class="img-top" id="profilePic" src="<?php echo $result['profile_pic']; ?>">
        <div class="card-body text-center">
            <a class="card-text" href="#">
                <?php echo $result['first_name'] ." ". $result['last_name'];?>
            </a>
            <p>Likes:
                <?php echo $result['num_likes']; ?>
            </p>
        </div>
    </div>
</div>
<div class="col-md-9" id="profileMain">
        <form class="d-flex justify-content-between" id="postWrapper" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <textarea name="post_text" placeholder="Got something to say ?" id="postText"></textarea>
            <input type="submit" name="post_btn" id="postBtn" value="Post!">
        </form>
    <div id="feed">
        <div class="post"></div>
    </div>
</div>