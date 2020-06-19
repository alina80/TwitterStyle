<?php
class Comment{
    private $id;
    private $userId;
    private $postId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = -1;
        $this->postId = -1;
        $this->text = '';
    }

    public static function loadCommentById(){}

    public static function loadAllCommentsByPostId(PDO $conn, int $tweetId){
        $sql = "SELECT `Comments`.`id` `commentId`,`Comments`.`userId` `commentor`,`Comments`.`text` `commentText`,`Comments`.`creationDate` `commentDate`,`Comments`.`postId` `tweetId`,`Tweet`.`userId` `tweetorId`,`Tweet`.`text` `tweetText`,`Tweet`.`creationDate` `tweetDate` FROM `Comments` 
                JOIN `Tweet` ON `Comments`.`postId`=`Tweet`.`id`
                WHERE `Comments`.`postId` =:tweetId ORDER BY `commentDate` DESC";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['tweetId'=>$tweetId]);

        if ($result){
            $commentsPerTweet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $commentsPerTweet;
        }
        return false;
    }

    public static function nrOfCommentsPerTweet(PDO $conn, int $tweetId){
        $sql = "SELECT `Comments`.`id` `commentId`,`Comments`.`userId` `commentor`,`Comments`.`text` `commentText`,`Comments`.`creationDate` `commentDate`,`Comments`.`postId` `tweetId`,`Tweet`.`userId` `tweetorId`,`Tweet`.`text` `tweetText`,`Tweet`.`creationDate` `tweetDate` FROM `Comments` 
                JOIN `Tweet` ON `Comments`.`postId`=`Tweet`.`id`
                WHERE `Comments`.`postId` =:tweetId";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['tweetId'=>$tweetId]);

        if ($result){
            $commentsPerTweet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $nrOfComments = 0;
            foreach ($commentsPerTweet as $item){
                $nrOfComments ++;
            }
            return $nrOfComments;
        }
        return 0;
    }

    public function saveComment(PDO $conn){
        if ($this->id === -1){
            $sql = "INSERT INTO `Comments` (`userId`,`postId`,`text`,`creationDate`) VALUES (:userId, :postId, :text, :creationDate)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'userId'=>$this->userId,
                'postId'=>$this->postId,
                'text'=>$this->text,
                'creationDate'=>$this->creationDate
            ]);

            if ($result){
                $this->id = $this->setId($conn->lastInsertId());
                return true;
            }
        }else{
            $sql = "UPDATE `Tweet` SET `userId`=:userId,`postId`=:postId,`text`=:text,`creationDate`=:creationDate WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'userId'=>$this->userId,
                'postId'=>$this->postId,
                'text'=>$this->text,
                'creationDate'=>$this->creationDate,
                'id'=>$this->id
            ]);

            if ($result){
                return true;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     */
    public function setPostId(int $postId): void
    {
        $this->postId = $postId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate): void
    {
        $this->creationDate = $creationDate;
    }


}