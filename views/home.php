<?php
if ($isLoggedIn){ ?>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4 mt-4">
            <form action="./index.php?page=addTweet" method="post">
                <div><?= $message ?></div>
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
        <div class="col-md-4 mt-4">Lista tweet-uri</div>
        <div class="col-md-2"></div>
    </div>
<?php }
