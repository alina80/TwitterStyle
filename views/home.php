<div class="row">
    <?php
    $hasErrors = false;
    $message = '';

    if ($isLoggedIn){ ?>
        <div class="col-md-1"></div>
        <div class="col-md-5 mt-4">
            <div class="row">
                <form action="./index.php?page=addTweet" method="post">
                    <div></div>
                    <div>
                        <label>Add Tweet
                            <textarea class="form-control" name="tweet" maxlength="140"></textarea>
                        </label>
                    </div>
                    <div>
                        <input class="btn btn-outline-primary" type="submit" value="Tweet" >
                    </div>
                    <hr>
                </form>
            </div>
            <div class="row">
                <legend>My Tweets</legend>
                <ul>
                    <?php
                    $myTweets = Tweet::loadAllTweetsByUserId($conn, $_SESSION['userId']);
                    foreach ($myTweets as $k=>$v){ ?>
                        <li class="nav-link"><span style="color: blue"><?= $v['creationDate'] ?></span><?= ' ' . $v['text'] ?></li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    <?php }else{ ?>
        <div class="col-md-3 mt-5">
            <h5>Not registred yet? You can register </h5>
            <?php
            include_once ROOT.'/views/register.php';
            ?>
            <a class="nav-link" href="./index.php?page=register">here</a>
        </div>
        <div class="col-md-3 mt-5">
            <h5>Already have an account? You can login </h5>
            <?php
            include_once ROOT.'/views/login.php';
            ?>
            <a class="nav-link" href="./index.php?page=login">here</a>
        </div>
    <?php } ?>
    <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
    <div class="col-md-6 mt-4">
        <legend>Tweets List</legend>
        <ul>
            <?php
            foreach ($tweetsList as $k=>$v){ ?>
                <li class="nav-link">
                    <div class="container">
                        <div class="row">
                            <div class="tweet-text">
                                <a class="nav-link" href="?page=user&userToDisplay=<?= $v['userId'] ?>"><?= "@". $v['name'] ?></a><?= $v['text'] ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="tweet-text">
                                    <a class="nav-link" href="?page=home&tweetId=<?= $v['tweetId'] ?>&comments=show&pageNr=<?= $pageNr ?>">
                                        <strong><?= $nrOfCommentsPerTweet[$v['tweetId']] ?><i class="fa fa-comments"> </i></strong>
                                    </a>
                                    <a class="nav-link" href="?page=home&tweetId=<?= $v['tweetId'] ?>&addComment=add&pageNr=<?= $pageNr ?>">
                                        <i class="fa fa-comment"></i>
                                    </a>
                                    <a class="nav-link" href="?page=user&userToDisplay=<?= $v['userId'] ?>">
                                        <i class="fa fa-paper-plane"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            require_once ROOT.'/includes/comment.php';

                            if ($_GET['page'] == 'home' && $_GET['pageNr'] ==  $pageNr &&  $_GET['tweetId'] == $v['tweetId'] && $_GET['comments']=='show'){

                                $commentsPerTweet = Comment::loadAllCommentsByPostId($conn, $v['tweetId']);
                                foreach ($commentsPerTweet as $key=>$value){
                                    $commentor = User::getById($conn,$value['commentor'])->getName();
                                    ?>
                                    <div id="nrOfComments"  class="col-md-12 nav-link tweetStyle">
                                        <ul>
                                            <li class="nav-link"><?= $commentor . ' said: ' . $value['commentText'] . ' on ' . $value['commentDate'] ?></li>
                                        </ul>
                                    </div>
                                <?php }
                            }
                            ?>
                            <?php

                            if ($_GET['page'] =='home' && $_GET['tweetId'] == $v['tweetId'] && $_GET['addComment'] == 'add'){

                                include_once ROOT.'/includes/comment.php';
                                ?>
                                <div class="col-md-12 mt-4">
                                    <form action="" method="post">
                                        <div >
                                            <textarea class="form-control mt-2" name="commentText" maxlength="60"></textarea>
                                        </div>
                                        <div>
                                            <input class="btn btn-outline-primary" type="submit" value="Comment" >
                                        </div>
                                    </form>
                                    <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>

                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </li>
            <?php }
            ?>
        </ul>
        <ul class="pagination">
            <?php
            for ($i = 1; $i <= $totalPages; $i ++ ){
                $pageNr = $i;
                ?>
                <li class="page-item"><a class="page-link" href="index.php?page=home&pageNr=<?= $pageNr ?>"> <?= $pageNr ?> </a></li>
            <?php }
            ?>
        </ul>
    </div>
</div>
