<?php

require_once'database.php';  //database.php ko function yo page ma chaine vayera require_once gareko

// yaha tala vayeko sabbai function hami aafaile hamro ichya le kaam garna ko lagi banayeko function haru ho
class UserModel
{
    function login($username, $password)
    {
        $database=new Database();       //Database vanni class ko, $database vanni object banayeko.

        $parameters=[               
        'username'=>$username,
        'password'=>$password
        ];  //yo $parameters khas ma list ho jasma key & value xa. 

        $sql ="select * from users where username= :username and password=md5(:password)";   
        //mathi password lai md5 le encrypt gareko

        $rows= $database->fetchAll($sql, $parameters);  //fetchAll vanni function call gareko.

        return count($rows) >0;
    }
    function get_by_id($id)
    {
        $database= new Database();     //Database vanni class ko, $database vanni object banayeko.

        $parameters=[                  //prepare statement or parameterized 
            'id'=> $id
        ];

        $sql = 'select * from users where id = :id';
        $row= $database->fetchAll($sql,$parameters);  //fetchAll vanni function call gareko.

        if(count($row)==0)
            return NULL;

        return $row[0];
    }

    function insert($username, $password)
    {
        $database=new Database();   //Database vanni class ko, $database vanni object banayeko.

        $parameters=[               //prepare statement or parameterized 
        'username'=>$username,
        'password'=>$password
        ];

        $sql ='insert into users(username, password) values(:username,md5(:password))';

        return $database->execute($sql,$parameters);
    }

    function update($id, $username)
    {
        $database=new Database();   //Database vanni class ko, $database vanni object banayeko.
        
        $parameters=[               //prepare statement or parameterized 
        'id'=> $id ,
        'username'=>$username
        
        ];

        $sql ='update users set username= :username where id= :id';

        return $database->execute($sql,$parameters);
    }

    function delete($id)
    {
        $database=new Database();   //Database vanni class ko, $database vanni object banayeko.
        
        $parameters=[               //prepare statement or parameterized 
            'id'=> $id
        ];

        $sql ='delete from users where id= :id';

        return $database->execute($sql,$parameters);
    }
}