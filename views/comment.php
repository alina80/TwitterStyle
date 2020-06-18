<?php

$postId = $_GET['tweetId'];
$_SESSION['tweetId'] = $postId;




if ($postId != 0 ){
    $tweet = Tweet::getById($conn,$_SESSION['tweetId']);
    ?>
    <div class="row">
        <div class="col-md-4 mt-4"></div>
        <div class="col-md-4 mt-4">
            <form action="" method="post">
                <div>
                    <input class="form-control" name="postId" value="<?= $postId ?>">
                </div>
                <div >
                    <textarea class="form-control mt-2" name="commentText" maxlength="60"></textarea>
                </div>
                <div>
                    <input class="btn btn-outline-primary" type="submit" value="Comment" >
                </div>
            </form>
            <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
        </div>
        <div class="col-md-4 mt-4"></div>
    </div>
<?php }
?>
