<?php
class AdminController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);   
    }

    public function page()
    {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            header("Location: /login");
            exit();
        }
        include 'View/header.php';
        $users = $this->userRepository->getAllUsers();
        include 'View/admin.php';
        include 'View/footer.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $email = htmlspecialchars($_POST['email']);
            $role = htmlspecialchars($_POST['role']);

            $this->userRepository->updateUser($id, $name, $firstname, $email, $role);
            header("Location: /admin");
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $this->userRepository->deleteUser($id);
            header("Location: /admin");
        }
    }
}
?>
