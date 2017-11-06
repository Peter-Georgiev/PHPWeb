<?php
declare(strict_types=1);
namespace Pesho;
class User
{
    private $id;
    private $username;
    private $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

}
$servername = "localhost";
$username = "root";
$password = "4545";
$dbname = "session_exercise";

spl_autoload_register();
$pdo = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$db = new \Database\PDODatabase($pdo);

/** @var User[] $users */
$users = $db
    ->query("SELECT * FROM users")
    ->execute()
    ->fetchAll(User::class);

//$users = $rs->fetchAll(User::class);

foreach ($users as $u) {
    echo $u->getUsername() . "<br/>";
}

?>
<script>
    console.log("Hello JS");
    document.write("Hello JS");
</script>
