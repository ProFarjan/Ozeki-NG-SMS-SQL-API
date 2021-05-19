<?php

/**
 * DB class provide database connection functionality
 *
 * @package   db
 * @copyright 2021 World University of Bangladesh (CIS)
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU GPL v3 or later
 */

class DB
{

    protected static $DB;
    private static $SERVER = 'localhost';
    private static $USER = 'root';
    private static $PASS = '$Farjan9215$';
    private static $DATABASE = 'sms_api';

    public function __construct()
    {
        try {
            self::$DB = new mysqli(self::$SERVER,self::$USER,self::$PASS,self::$DATABASE);
        }catch (Exception $e){
            die("Connection failed: ". self::$DB->connect_error);
        }
    }

    private function ozekimessagein(){
        $sql = "CREATE TABLE ozekimessagein( id INT(11) NOT NULL AUTO_INCREMENT, sender VARCHAR(255) DEFAULT NULL, receiver VARCHAR(255) DEFAULT NULL, msg TEXT DEFAULT NULL, senttime VARCHAR(100) DEFAULT NULL, receivedtime VARCHAR(100) DEFAULT NULL, operator VARCHAR(100) DEFAULT NULL, msgtype VARCHAR(160) DEFAULT NULL, reference VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id) ) CHARSET = utf8;";
        if (self::$DB->query($sql) === TRUE)
        {
            echo "Successfully Created Table {ozekimessagein}";
        }else{
            echo "Error Create Table: ".self::$DB->error;
        }

    }


    private function ozekimessageout(){
        $sql = "CREATE TABLE ozekimessageout( id INT(11) NOT NULL AUTO_INCREMENT, sender VARCHAR(255) DEFAULT NULL, receiver VARCHAR(255) DEFAULT NULL, msg TEXT DEFAULT NULL, senttime VARCHAR(100) DEFAULT NULL, receivedtime VARCHAR(100) DEFAULT NULL, reference VARCHAR(100) DEFAULT NULL, STATUS VARCHAR (20) DEFAULT NULL, msgtype VARCHAR(160) DEFAULT NULL, operator VARCHAR(100) DEFAULT NULL, errormsg VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id) ) CHARSET = utf8;";
        if (self::$DB->query($sql) === TRUE)
        {
            echo "Successfully Created Table {ozekimessageout}";
        }else{
            echo "Error Create Table: ".self::$DB->error;
        }
    }


    public function createTable()
    {
        print_r('<pre>');
        $this->ozekimessagein();
        print_r('<br>');
        $this->ozekimessageout();
        print_r('<br>');
        $sql = "ALTER TABLE ozekimessagein ADD INDEX (id);";
        $sql_2 = "ALTER TABLE ozekimessageout ADD INDEX (id);";
        self::$DB->query($sql);
        self::$DB->query($sql_2);
        echo "Successfully Finished!";
        print_r('</pre>');
    }


    public function __destruct()
    {
        self::$DB->close();
    }

}

print_r('<pre>');
$db = new DB();
$db->createTable();
print_r('</pre>');