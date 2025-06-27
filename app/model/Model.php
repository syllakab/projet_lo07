
<?php
// la classe modele permet ici de définir une instance
class Modele extends PDO {

    private static $_instance;
    
    public static function getInstance()
    {
        include_once '../controller/configuration.php';

        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        if (!isset(self::$_instance)) 
        {
            try
            {
                self::$_instance = new PDO($dsn, $username, $password, $options);
            } 
            catch (PDOException $e) 
            {
                printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            }
        }
        return self::$_instance;
    }
}

?> 

