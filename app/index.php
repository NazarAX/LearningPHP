<?php


class DatabaseMaker
{
    private string $host;
    private string $username;
    private string $password;
    private string $dbname;

    private mysqli $connection;


    public function __construct(string $host, string $username, string $password, string $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }


    public function connect() : mysqli
    {
        $this->connection =  new mysqli( $this->host, $this->username, $this->password, $this->dbname);

        return $this->connection;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function getHost(): string
    {
        return $this->host;
    }
    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


    public function query(string $query): bool
    {
        return $this->connection->query($query);
    }




}

$maker = new DatabaseMaker("mysql", "root", "root", "app");

$db = $maker->connect();

if ($db->connect_error)
{
    echo "Connection failed: " . $db->connect_error;
}
else
{
    echo "Connected successfully<br/>";
}

echo "SERVER<br/>";
foreach($_SERVER as $name => $value)
{
    echo "name $name; Value $value<br/>";
}

echo "COOKIES<br/>";

foreach ($_COOKIE as $key => $value) {
    echo "Cookie name: $key; Value: $value<br>";
}

if (isset($_POST["name"]) && isset($_POST["email"]))
{
    if ($db->query("INSERT INTO users (id, name, email, date) VALUES (0, '$_POST[name]', '$_POST[email]', NOW())"))
    {
        echo "Success<br/>";
    }
    else
    {
        echo "Failed<br/>";
    }
}


