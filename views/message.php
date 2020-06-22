<?php
require_once ROOT.'/includes/message.php';
?>
<div class="row">
   <div class="col-md-2 mt-4"></div>
   <div class="col-md-8 mt-4">
       <ul class="list-group">
           <li class="list-group-item">From: <?= $sender ?></li>
           <li class="list-group-item">Date: <?= $date ?></li>
           <li class="list-group-item">Message: <?= $text ?></li>
       </ul>
   </div>
   <div class="col-md-2 mt-4"></div>
</div>
<div class="row">
    <div class="col-md-2 mt-4"></div>
    <div class="col-md-8 mt-4">
        <form action="" method="post">
            <button class="btn btn-outline-primary" name="action" value="back">Back</button>
            <?php
            if ($selectedMessage->getRecipientId() == $_SESSION['userId']){ ?>
                <button class="btn btn-outline-primary" name="action" value="delete">Delete</button>
            <?php }
            ?>

        </form>
    </div>
    <div class="col-md-2 mt-4"></div>
</div>
