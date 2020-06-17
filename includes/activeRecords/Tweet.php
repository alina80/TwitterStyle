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

    public static function loadAllTweets(PDO $conn): array {
        $tweets = [];
        $sql = "SELECT `text`,`creationDate`,`name` FROM `Tweet` JOIN `Users` ON `Tweet`.`userId`=`Users`.`id` ORDER BY `creationDate` DESC";
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

