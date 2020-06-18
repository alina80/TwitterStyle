<?php
class Tweet{
    private $id;
    private $userId;
    private $text;
    private $creationDate;

    public function __construct()
    {
        $this->id = -1;
        $this->userId = -1;
        $this->text = '';
    }

    public static function getById(PDO $conn, int $tweetId){
        $sql = "SELECT * FROM `Tweet` WHERE `id`=:tweetId";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['tweetId'=>$tweetId]);
        if ($result && $stmt->rowCount() > 0){
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $tweet = new Tweet();
            $tweet->text = $record['text'];
            $tweet->creationDate = $record['creationDate'];
            $tweet->userId =$record['userId'];
            $tweet->id = $record['id'];

            return $tweet;
        }
        return null;
    }

    public static function loadAllTweetsByUserId(PDO $conn, int $userId){
        $userTweets = [];
        $sql= "SELECT `text`,`creationDate`,`name` FROM `Tweet` 
               JOIN `Users` ON `Tweet`.`userId`=`Users`.`id` 
               WHERE `Users`.`id`=:id
               ORDER BY `creationDate` DESC ";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['id'=>$userId]);
        if ($result !== false && $stmt->rowCount() > 0) {
            $userTweets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $userTweets;
    }

    public static function loadAllTweets(PDO $conn): array {
        $tweets = [];
        $sql = "SELECT `Tweet`.`id` `tweetId`,`text`,`creationDate`,`name` FROM `Tweet` JOIN `Users` ON `Tweet`.`userId`=`Users`.`id` ORDER BY `creationDate` DESC";
        $result = $conn->query($sql);

        if ($result !== false && $result->rowCount() > 0) {
            $tweets = $result->fetchAll(PDO::FETCH_ASSOC);
        }
    return $tweets;
    }

    public function saveTweet(PDO $conn){
        if ($this->id === -1){
            $sql = "INSERT INTO `Tweet` (`userId`,`text`,`creationDate`) VALUES (:userId, :text, :creationDate)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'userId'=>$this->userId,
                'text'=>$this->text,
                'creationDate'=>$this->creationDate
            ]);

            if ($result){
                $this->id = $this->setId($conn->lastInsertId());
                return true;
            }
        }else{
            $sql = "UPDATE `Tweet` SET `userId`=:userId,`text`=:text,`creationDate`=:creationDate WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'userId'=>$this->userId,
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

