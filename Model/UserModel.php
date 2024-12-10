<?php
class User
{
    public int $idUser;
    public string $email;
    public string $firstName;
    public string $name;
    public string $password;
    public string $role;
    public string $create_time;

    public function getId(): int
    {
        return $this->idUser;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getfirstName(): string
    {
        return $this->firstName;
    }
    public function setfirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRole():string
    {
        return $this->role;
    }
    public function setRole(string $role): self
    {
        $this->role=$role;
        return $this;
    }

    public function getCreateTime(): string
    {
        return $this->create_time;
    }

}