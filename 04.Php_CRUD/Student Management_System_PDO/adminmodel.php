<?php

require_once 'database.php';  


class AdminModel
{

    function login($username, $password)
    {
        $database = new Database();       

        $parameters=[               
        'username'=>$username,
        'password'=>$password
        ];   

        $sql ="select * from admin where username= :username and password=md5(:password)";   
        

        $rows= $database->fetchAll($sql, $parameters);  

        return count($rows) >0;
    }


    function insert($rollno, $name, $city, $pcon, $std, $imagename)
    {
        $database=new Database();   

        $parameters=[         
        'rollno'=>$rollno,
        'name'=>$name,
        'city'=>$city,
        'pcon'=>$pcon,
        'standerd'=>$std,
        'image'=>$imagename
        ];

        $sql ='insert into student(rollno, name, city, pcont, standerd, image) values(:rollno, :name, :city, :pcon, :standerd, :image)';

        return $database->execute($sql,$parameters);
    }

    function get_by_id($id)
    {
        $database= new Database();     

        $parameters=[                  
            'id'=> $id
        ];

        $sql = 'select * from student where id = :id';
        $row= $database->fetchAll($sql,$parameters);  

        if(count($row)==0)
            return NULL;

        return $row[0];
    }

    function update($id, $rollno, $name, $city, $pcon, $std, $imagename)
    {
        $database=new Database();   
        
        $parameters=[                
        'id'=> $id ,
        'rollno'=>$rollno,
        'name'=>$name,
        'city'=>$city,
        'pcon'=>$pcon,
        'standerd'=>$std,
        'image'=>$imagename
        ];

        $sql ="update student set rollno= :rollno, name= :name, city= :city, pcont= :pcon, standerd= :standerd, image= :image where id= :id";

        return $database->execute($sql,$parameters);
    }


    function delete($id)
    {
        $database=new Database();   
        
        $parameters=[                
            'id'=> $id
        ];

        $sql ='delete from student where id= :id';

        return $database->execute($sql,$parameters);
    }

    function get_by_rollno($rollno)
    {
        $database= new Database();     

        $parameters=[                  
            'rollno'=> $rollno
        ];

        $sql = 'select * from student where rollno = :rollno';
        $row= $database->fetchAll($sql,$parameters);  

        if(count($row)==0)
            return NULL;

        return $row[0];
    }

    
    

}

