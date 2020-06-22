<?php
require_once ROOT.'/includes/messages.php';
?>
<div class="row">
    <div class="col-md-5 mt-4 offset-1">
        <i class="fa fa-envelope"></i> Received Messages
        <table class="table table-hover table-responsive">
            <caption>Received Messages</caption>
            <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col">From</th>
                <th scope="col">Date</th>
                <th scope="col">Message</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($receivedMessages as $k=>$mess){
                $i ++;
                $senderName = User::getById($conn, $mess['senderId'])->getName();
                if ($mess['isRead'] == 0){?>

                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><strong><?= $senderName ?></strong></td>
                    <td><strong><?= $mess['creationDate'] ?></strong></td>
                    <td><strong><?= substr($mess['message'],0,30) . '...' ?></strong></td>
                    <td><button class="btn btn-outline-primary" type="submit" name="read" value="yes"><a class="nav-link" href="?page=message&read=yes&message=<?= $mess['messageId'] ?>">Read</a> </button> </td>
                </tr>

            <?php }else{ ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $senderName ?></td>
                        <td><?= $mess['creationDate'] ?>></td>
                        <td><?= substr($mess['message'],0,30) . '...' ?></td>
                        <td><button class="btn btn-outline-primary" type="submit" name="read" value="yes"><a class="nav-link" href="?page=message&read=yes&message=<?= $mess['messageId'] ?>">Read</a> </button> </td>
                    </tr>
            <?php }
            }
            ?>
            </tbody>
        </table>
    </div>


    <div class="col-md-5 mt-4 offset-1">
        <i class="fa fa-paper-plane"></i> Sent Messages
        <table class="table table-hover table-responsive">
            <caption>Sent Messages</caption>
            <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col">Sent to</th>
                <th scope="col">Date: On</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            foreach ($sentMessages as $k=>$mess){
            $i ++;
            $recipientName = User::getById($conn, $mess['receiver'])->getName(); ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $recipientName ?></td>
                <td><?= $mess['creationDate'] ?></td>
                <td><?= substr($mess['message'],0,30) . '...' ?></td>
                <td><button class="btn btn-outline-primary" type="submit" name="read" value="yes"><a class="nav-link" href="?page=message&read=yes&message=<?= $mess['messageId'] ?>">Read</a></button> </td>
            </tr>
            <?php }
            ?>
            </tbody>
        </table>
    </div>
</div>