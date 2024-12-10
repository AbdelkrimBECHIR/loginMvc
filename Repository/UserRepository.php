<?php

class UserRepository 
{
    private PDO $dbh;

    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function getUserByEmailAndPassword(array $credentials): ?User
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email LIMIT 1';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute([
                'email' => $credentials['email']
            ]);

            $user = $stmt->fetchObject(User::class);
            
            if ($user && password_verify($credentials['password'], $user->getPassword())) {
                return $user;
            }
            
            return null;
        } catch (PDOException $e) {
            // Log error securely, don't expose details
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    public function insert(array $infos): bool 
    {
        try {
            $sql = 'INSERT INTO user (username, name, email, password, role, create_time) 
                    VALUES (:username, :name, :email, :password, :role, NOW())';
            
            $stmt = $this->dbh->prepare($sql);
            return $stmt->execute([
                'username' => $infos['username'],
                'name' => $infos['name'],
                'email' => $infos['email'],
                'password' => password_hash($infos['password'], PASSWORD_DEFAULT),
                'role' => $infos['role'] ?? 'USER'
            ]);
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
    
    public function findByEmail(string $email): ?User 
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email LIMIT 1';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(['email' => $email]);
            
            return $stmt->fetchObject(User::class) ?: null;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }
}
