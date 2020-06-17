<div class="row">
    <?php
    require_once ROOT.'/includes/activeRecords/Tweet.php';
    if ($isLoggedIn){ ?>
        <div class="col-md-6 mt-4 text-center">
            <form action="./index.php?page=addTweet" method="post">
                <div></div>
                <div>
                    <label>Add Tweet
                        <textarea class="form-control" name="tweet" maxlength="60"></textarea>
                    </label>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Tweet" >
                </div>
            </form>
        </div>
    <?php }else{ ?>
        <div class="col-md-3 mt-5 text-center">
            <h5>Not registred yet? You can register </h5>
            <a class="nav-link" href="./index.php?page=register">here</a>
        </div>
        <div class="col-md-3 mt-5 text-center">
            <h5>Aready have an account? You can login </h5>
            <a class="nav-link" href="./index.php?page=login">here</a>
        </div>
    <?php } ?>
    <div class="col-md-6 mt-4">
        <legend>Tweets List</legend>
        <ul>
            <?php
            $tweetsList = Tweet::loadAllTweets($conn);
            $nrOfTweets = count($tweetsList);  //total items in array
            $perPage = 3;  //per page

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
                    <a class="nav-link" href="#"><?= "@". $v['name'] ?></a><?= $v['text'] ?>
                </li>
            <?php }
            ?>
        </ul>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $totalPages; $i ++ ){ ?>
                    <?php $pageNr = $i; ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=home&pageNr=<?= $pageNr ?>"> <?= $pageNr ?> </a></li>
                <?php }
                ?>
            </ul>
        </nav>
    </div>
</div>
