<?php
class Message{
    private $id;
    private $senderId;
    private $recipientId;
    private $messageText;
    private $creationDate;
    private $isRead;

    public function __construct()
    {
        $this->id = -1;
        $this->senderId = -1;
        $this->recipientId = -1;
        $this->messageText = '';
        $this->isRead = 0;
    }

    public static function deleteMessage(PDO $conn, int $messageId){
        $sql = "DELETE FROM `Messages` 
                WHERE `Messages`.`id`=:messageId";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['messageId'=>$messageId]);
        if ($result && $stmt->rowCount() > 0){
            return true;
        }
        return false;
    }

    public static function getMessageById(PDO $conn, int $messageId){
        $sql = "SELECT * FROM `Messages` 
                WHERE `Messages`.`id`=:messageId";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['messageId'=>$messageId]);
        if ($result && $stmt->rowCount() > 0){
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $mes = new Message();
            $mes->senderId = $record['senderId'];
            $mes->recipientId = $record['recipientId'];
            $mes->creationDate =$record['creationDate'];
            $mes->id = $record['id'];
            $mes->isRead = $record['isRead'];
            $mes->messageText = $record['messageText'];

            return $mes;
        }
        return null;
    }

    public static function getAllMessagesBySenderId(PDO $conn, int $senderId){
        $sql = "SELECT `Messages`.`id` `messageId`,`Messages`.`senderId` `senderId`,`Messages`.`creationDate` `creationDate`,`Messages`.`messageText` `message`,`Messages`.`recipientId` `receiver` 
                FROM `Messages` 
                JOIN `Users` ON `Messages`.`senderId`=`Users`.`id`
                WHERE `Messages`.`senderId`=:senderId
                ORDER BY `Messages`.`creationDate` DESC";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['senderId'=>$senderId]);
        if ($result && $stmt->rowCount() > 0){
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }
        return null;
    }

    public static function getAllMessagesByReceiverId(PDO $conn, int $receiverId){
        $sql = "SELECT `Messages`.`id` `messageId`,
                       `Messages`.`senderId` `senderId`,
                       `Messages`.`creationDate` `creationDate`,
                       `Messages`.`messageText` `message`,
                       `Messages`.`recipientId` `receiver`,
                       `Messages`.`isRead` `isRead`
                FROM `Messages` 
                JOIN `Users` ON `Messages`.`recipientId`=`Users`.`id`
                WHERE `Messages`.`recipientId`=:receiverId
                ORDER BY `Messages`.`creationDate` DESC";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['receiverId'=>$receiverId]);
        if ($result && $stmt->rowCount() > 0){
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $records;
        }
        return null;
    }

    public function saveMessage(PDO $conn){
        if ($this->id === -1){
            $sql = "INSERT INTO `Messages` (`senderId`,`recipientId`,`messageText`,`creationDate`,`isRead`) VALUES (:senderId, :recipientId, :messageText, :creationDate, :isRead)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'senderId'=>$this->senderId,
                'recipientId'=>$this->recipientId,
                'messageText'=>$this->messageText,
                'creationDate'=>$this->creationDate,
                'isRead'=>$this->isRead
            ]);

            if ($result){
                $this->id = $this->setId($conn->lastInsertId());
                return true;
            }
        }else{
            $sql = "UPDATE `Messages` SET `senderId`=:senderId,`recipientId`=:recipientId,`messageText`=:messageText,`creationDate`=:creationDate,`isRead`=:isRead WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'senderId'=>$this->senderId,
                'recipientId'=>$this->recipientId,
                'messageText'=>$this->messageText,
                'creationDate'=>$this->creationDate,
                'isRead'=>$this->isRead,
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
    public function getSenderId(): int
    {
        return $this->senderId;
    }

    /**
     * @param int $senderId
     */
    public function setSenderId(int $senderId): void
    {
        $this->senderId = $senderId;
    }

    /**
     * @return int
     */
    public function getRecipientId(): int
    {
        return $this->recipientId;
    }

    /**
     * @param int $recipientId
     */
    public function setRecipientId(int $recipientId): void
    {
        $this->recipientId = $recipientId;
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->messageText;
    }

    /**
     * @param string $messageText
     */
    public function setMessageText(string $messageText): void
    {
        $this->messageText = $messageText;
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

    /**
     * @return int
     */
    public function getIsRead(): int
    {
        return $this->isRead;
    }

    /**
     * @param int $isRead
     */
    public function setIsRead(int $isRead): void
    {
        $this->isRead = $isRead;
    }


}