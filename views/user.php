<?php
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-4">
            <ul>
                <legend>
                    <h5><?= $userToDisplayName ?> page</h5>
                    <hr>
                    <h6><strong>Tweets : </strong></h6>
                </legend>
                <?php
                foreach ($userTweets as $k=>$v){ ?>
                    <li class="nav-link"><?= $v['text'] ?></li>
                <?php }
                ?>

            </ul>

        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <button class="btn btn-outline-primary" type="submit" name="message"><a class="nav-link" href="#">Send message </a> </button>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
