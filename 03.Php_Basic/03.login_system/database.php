
<?php 

class Database 
{

    private $pdo;  //$pdo variable lai private garyo vani,,, yo Databse class bhitra matra access garna milxa.

    public function __construct() 
    {
        $host = 'localhost';
        $db_name = 'trinity';
        $db_username = 'root';
        $db_password = '';
        $options = array(                                   //yaha array lekhnu ko karan chai k ho ??
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // Error aayo vani... tyo erro lai exception jasari dekhaune
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //Data Fetch garda default associative array ma fetch garni
        );
            
        //yo tala ko code chai, creating Database connection using PDO
        $this->pdo = new PDO("mysql:host=$host;dbname=$db_name", $db_username, $db_password, $options);

    }

    public function fetchAll($sql, $parameters = NULL)  //suru ma $parameters lai khali i.e null garako
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);               //$statement lai execute gareko by using $parameters 
        return $statement->fetchAll();                  //$statement lai execute garisake paxi chai aba fetchAll gareko
    }

    public function execute($sql, $parameters = NULL) 
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($parameters);
        return $statement->rowCount();    
        //rowCount() returns the number of rows affected by the last DELETE, INSERT, or UPDATE statement executed by the corresponding PDO Statement object
    }

}   