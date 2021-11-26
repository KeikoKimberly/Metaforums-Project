<?php

function setUpDBConnection(){
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $database = "project3";

    $conn = mysqli_connect($hostName, $userName, $password, $database);
    return $conn;
}

class Database { 
    function read($query){
        $conn = setUpDBConnection();
        $result = mysqli_query($conn,$query);

        if(!$result){
            return false;
        } else {
            $data = false;
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }

            return $data;
        }
    }

    function save($query){
        $conn = setUpDBConnection();
        $result = mysqli_query($conn,$query);

        if(!$result){
            return false;
        } else {
            return true;
        }
    }

}

    function create_postid() {
        $length = rand(4,19);
        $number = "";
        for($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
    
            $number = $number . $new_rand;
        }
    
        return $number;
    }

    function create_post ($userid,$data){
        $conn = setUpDBConnection();
            if(!empty($data['post'])) {
                $post = $data['post'];
                $postid = create_postid();
                $ctg = $data["ctg"];
    
                mysqli_query($conn,"INSERT INTO posts(userid,postid, post, category) VALUES('$userid','$postid','$post','$ctg')");
                return mysqli_affected_rows($conn);
            } else { 
                $error = "Please type something to post<br>";
            }
    }


    function updateInfo($data){
        $conn = setUpDBConnection();
        $email = $data['email'];
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);
        $userid = $_SESSION["id"];
        $password = md5($password);
        $vkey = md5(time().$username);

        $sql = "UPDATE account SET email='$email', password='$password', vkey='$vkey', verified = 0 WHERE userid='$userid'";

        mysqli_query($conn,$sql);

        return mysqli_affected_rows($conn);
    }

    function insert ($data) {
        $conn = setUpDBConnection();
        $username = $data['username'];
        $email = $data["email"];
        $password = mysqli_real_escape_string($conn,$data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);

        $password = md5($password);

        $vkey = md5(time().$username);

        mysqli_query($conn,"INSERT INTO account(username,email,password,vkey) VALUES('$username','$email','$password','$vkey')");

        return mysqli_affected_rows($conn);
       }
?>