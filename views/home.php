<div class="row">
    <?php
    require_once ROOT.'/includes/activeRecords/Tweet.php';
    require_once ROOT.'/includes/activeRecords/User.php';
    require_once ROOT.'/includes/activeRecords/Comment.php';

    $hasErrors = false;
    $message = '';

    if ($isLoggedIn){ ?>
        <div class="col-md-1"></div>
        <div class="col-md-5 mt-4">
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
            <legend>My Tweets</legend>
            <ul>
                <?php
                $myTweets = Tweet::loadAllTweetsByUserId($conn, $_SESSION['userId']);
                foreach ($myTweets as $k=>$v){ ?>
                    <li class="nav-link"><?= $v['text'] ?></li>
                <?php }
                ?>
            </ul>
        </div>
    <?php }else{ ?>
        <div class="col-md-3 mt-5 text-center">
            <h5>Not registred yet? You can register </h5>
            <a class="nav-link" href="./index.php?page=register">here</a>
        </div>
        <div class="col-md-3 mt-5 text-center">
            <h5>Already have an account? You can login </h5>
            <a class="nav-link" href="./index.php?page=login">here</a>
        </div>
    <?php } ?>
    <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
    <div class="col-md-6 mt-4">
        <legend>Tweets List</legend>
        <ul>
            <?php
            $tweetsList = Tweet::loadAllTweets($conn);
            $nrOfTweets = count($tweetsList);  //total items in array
            $perPage = 6;  //per page

            $pageNr = ! empty( $_GET['pageNr'] ) ? (int) $_GET['pageNr'] : 1;

            $totalPages = ceil( $nrOfTweets / $perPage ); //calculate total pages

            $pageNr = isset($_GET['pageNr']) && is_numeric($_GET['pageNr']) && $_GET['pageNr'] > 0 ?
                $_GET['pageNr'] : max($pageNr, 1);  //get 1 page when $_GET['page'] <= 0
            $pageNr = isset($_GET['pageNr']) && is_numeric($_GET['pageNr']) && $_GET['pageNr'] <= $totalPages ?
                $_GET['pageNr'] : min($pageNr, 1);  //get last page when $_GET['page'] > $totalPages

            $offset = ($pageNr - 1) * $perPage;
            if( $offset < 0 ) {
                $offset = 0;
            }

            $tweetsList = array_slice( $tweetsList, $offset, $perPage );

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
                                    <a class="nav-link" href="?page=home&tweetId=<?= $v['tweetId'] ?>&comments=show">
                                        <?php
                                        $nrOfCommentsPerTweet = Comment::nrOfCommentsPerTweet($conn,$v['tweetId'])
                                        ?>
                                        <strong><?= $nrOfCommentsPerTweet ?><i class="fa fa-comments"> </i></strong>
                                    </a>
                                    <a class="nav-link" href="?page=home&tweetId=<?= $v['tweetId'] ?>&addComment=add">
                                        <i class="fa fa-comment"></i>
                                    </a>
                                    <a class="nav-link" href="?page=comment&tweetId=<?= $v['tweetId'] ?>">
                                        <i class="fa fa-paper-plane"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php

                            if ($_GET['page'] == 'home' && $_GET['tweetId'] == $v['tweetId'] && $_GET['comments']=='show'){
                                $commentsPerTweet = Comment::loadAllCommentsByPostId($conn, $v['tweetId']);
                                foreach ($commentsPerTweet as $key=>$value){ ?>
                                    <div id="nrOfComments"  class="col-md-12 nav-link tweetStyle">
                                        <ul>
                                            <li class="nav-link"><?= $value['commentor'] . ' said: ' . $value['commentText'] . ' on ' . $value['commentDate'] ?></li>
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
            for ($i = 1; $i <= $totalPages; $i ++ ){ ?>
                <?php $pageNr = $i; ?>
                <li class="page-item"><a class="page-link" href="index.php?page=home&pageNr=<?= $pageNr ?>"> <?= $pageNr ?> </a></li>
            <?php }
            ?>
        </ul>
    </div>
</div>
