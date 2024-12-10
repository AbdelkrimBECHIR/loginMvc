<?php

class UserRepository 
{
    private PDO $dbh;

    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }


    public function createUser(RegisterModel $user)
    {
        try {
            $stmt = $this->dbh->prepare("
                INSERT INTO user (name, firstname, email, password, role) 
                VALUES (:name, :firstname, :email, :password, 'user')
            ");
            $stmt->bindParam(':name', $user->name);
            $stmt->bindParam(':firstname', $user->firstname);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':password', $user->password);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de l'insertion dans la base de données : " . $e->getMessage());
        }
    }

    public function userExists($email)
    {
        $stmt = $this->dbh->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getUserByEmailAndPassword($email, $password): ?User
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email LIMIT 1';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(['email' => $email]);

            $user = $stmt->fetchObject(User::class);

            if ($user && password_verify($password, $user->getPassword())) {
                return $user;
            }

            return null;
        } catch (PDOException $e) {
            error_log("Erreur de base de données : " . $e->getMessage());
            return null;
        }
    }

    public function updateUserProfil($idUser, $user) {
        $query = "UPDATE user SET name = :name, email = :email WHERE idUser = :idUser";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':name', $user['name']);
        $stmt->bindParam(':email', $user['email']);
        $stmt->bindParam(':idUser', $userId);
        return $stmt->execute();
    }
    
    public function deleteUserProfil($idUser) {
        $query = "DELETE FROM user WHERE idUser = :idUser";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':idUser', $userId);
        return $stmt->execute();
    }
    
    public function getUserByIdProfil($userId) {
        $query = "SELECT * FROM user WHERE idUser= :id";
        $stmt = $this->dbh->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

      
    public function getAllUsers()
    {
        $stmt = $this->dbh->query("SELECT * FROM user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $firstname, $email, $role)
    {
        $stmt = $this->dbh->prepare("UPDATE user SET name = ?, firstname = ?, email = ?, role = ? WHERE idUser = ?");
        $stmt->execute([$name, $firstname, $email, $role, $id]);
    }

    public function deleteUser($id)
    {
        $stmt = $this->dbh->prepare("DELETE FROM user WHERE idUser = ?");
        $stmt->execute([$id]);
    }

}
