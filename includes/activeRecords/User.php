<?php

class User{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct()
    {
        $this->id = -1;
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public static function loginUser(PDO $conn, string $email, string $password){
        $sql = "SELECT * FROM `Users` WHERE `email`=:email";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['email'=>$email]);
        if ($result && $stmt->rowCount() > 0){
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password,$record['password'])){
                $user = new User();
                $user->setName($record['name']);
                $user->setEmail($record['email']);
                $user->setPassword($record['password']);
                $user->setId($record['id']);

                return $user;
            }

        }
        return null;
    }

    public static function getById(PDO $conn, int $userId){
        $sql = "SELECT * FROM `Users` WHERE `id`=:userId";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['userId'=>$userId]);
        if ($result && $stmt->rowCount() > 0){
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->name = $record['name'];
            $user->email = $record['email'];
            $user->password =$record['password'];
            $user->id = $record['id'];

            return $user;
        }
        return null;
    }

    public static function getByEmail(PDO $conn, string $email){
        $sql = "SELECT * FROM `Users` WHERE `email`=:email";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['email'=>$email]);
        if ($result && $stmt->rowCount() > 0){
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            $user = new User();
            $user->setName($record['name']);
            $user->setEmail($record['email']);
            $user->setPassword($record['password']);
            $user->setId($record['id']);

            return $user;
        }
        return null;
    }

    public function save(PDO $conn){
        if ($this->id === -1){
            $sql = "INSERT INTO `Users` (`name`,`email`,`password`) VALUES (:name, :email,:password)";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>$this->password
            ]);

            if ($result){
                $this->id = $this->setId($conn->lastInsertId());
                return true;
            }

        }else{
            $sql = "UPDATE `Users` SET `name` =: name,`email` =: email,`password` =: password WHERE `id` =:id";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>$this->password,
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $newHashedPass = password_hash($password,PASSWORD_BCRYPT);
        $this->password = $newHashedPass;
    }



}