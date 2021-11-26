<?php
class Post {
    private $error = "";
    public function createpost($verified,$userid,$data){
        if(!empty($data['post'])){
            $post = addslashes($data['post']);
            $postid = $this->createpostid();
            $ctg = $data['ctg'];
            
            $query = "insert into posts(userid,post,postid,category,verified) values ('$userid','$post','$postid','$ctg','$verified')";
            
            $DB = new Database();
            $DB->save($query);

        } else {
            $this->error = "Please enter something to post<br>";
        }

        return $this->error;
    }
    
    public function get_posts($userid){
        $query = "SELECT * FROM posts WHERE userid='$userid'  ORDER BY id DESC limit 10";
        $DB = new Database();
        $result = $DB->read($query); 
    
        if($result) {
           return $result;
        } else {
            return false;
        }
    }

    public function get_postdetail($id){
        $query = "SELECT * FROM posts WHERE id='$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);
        
        if($result) {
            return $result;
         } else {
             return false;
         }
    }

    public function get_allposts() {
        $query = "SELECT * FROM posts ORDER BY id DESC limit 5";
        $DB = new Database();
        $result = $DB->read($query); 
    
        if($result) {
           return $result;
        } else {
            return false;
        }
    }
    
    private function createpostid() {
        $length = rand(4,19);
        $number = "";
        for($i=0;$i<$length;$i++){
            $new_rand = rand(0,9);
    
            $number = $number . $new_rand;
        }
    
        return $number;
    }
    
}

// function get_time($userid) {
//     $conn = setUpDBConnection();
//     $l = "SELECT time FROM pardoning WHERE userid='$userid'";
//     $r = mysqli_query($conn,$l);
//     $time = mysqli_fetch_assoc($r);
//     $result = time_diff($time['time']);

//     if($result < '3') {
//         $t = "UPDATE account SET status = '2' WHERE userid='$userid'";
//         $c = mysqli_query($conn,$t);   
//     } else if($result > '3'){
//         $v = "UPDATE account SET status = '1' WHERE userid='$userid'";
//         $b = mysqli_query($conn,$v);
//     }
// }

function time_diff($time) {
    date_default_timezone_set("Asia/Jakarta");
    $time1 = date_create($time);
    $time2 = date_create();

    $diff = date_diff($time2,$time1);
    
    return $diff->i;
}


?>

