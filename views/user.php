<?php
require_once ROOT.'/includes/user.php';
require_once ROOT.'/includes/sendMessage.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-4">
            <ul>
                <legend>
                    <h5><?= $userToDisplayName ?>'s page</h5>
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
        <?php
        if ($_GET['page'] == 'user' && $_GET['userToDisplay'] == $userToDisplay && $_GET['send'] != 'yes'){ ?>
        <div class="col-md-8">
            <button class="btn btn-outline-primary" type="submit" name="message"><a class="nav-link" href="?page=user&userToDisplay=<?= $userToDisplay ?>&send=yes">Send message </a> </button>
        </div>
        <?php }
        ?>

        <div class="col-md-8">
            <?php
            if ($_GET['page'] == 'user' && $_GET['userToDisplay'] == $userToDisplay && $_GET['send'] == 'yes'){ ?>
                <form action="" method="post">
                    <div></div>
                    <div>
                        <label>Write Message
                            <textarea class="form-control" name="message" maxlength="140"></textarea>
                        </label>
                    </div>
                    <div>
                        <input class="btn btn-outline-primary" type="submit" value="Send" >
                    </div>
                    <hr>
                </form>

            <?php }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div>
        <?= $message ?>
    </div>


</div>
