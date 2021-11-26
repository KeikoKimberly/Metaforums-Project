<?php

class User {
    public function get_data($id){
        $query = "select * from account where userid = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);
        
        if($result) {
            $row = $result[0];
            return $row;
        } else {
            return false;
        }
    }

    public function get_user($id) {
        $query = "select * from posts where userid='$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function get_userpostdetail($id){
        $query = "select post from posts where id='$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function get_category($id){
        $query = "select category from posts where id='$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function get_alluser(){
        $query = "select * from posts";
        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function get_friends($id) {
        $query = "select * from account where userid!='$id' ";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) {
            return $result;
        } else {
            return false;
        }
    }
}


?>