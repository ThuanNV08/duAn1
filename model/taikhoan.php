<?php
    function insert_taikhoan($firstname, $lastname, $username, $email, $password)
    {
        $sql = "insert into taikhoan (firstname, lastname, username, email, pass) values('$firstname', '$lastname', '$username', '$email', '$password' )";
        pdo_execute($sql);
    }
    function checkuser($email, $password)
    {
        $sql = "select * from taikhoan where email = '$email' and pass ='$password'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function delete_taikhoan($id){
        $sql = "delete from taikhoan where id =". $id;
        pdo_query($sql);
    }
    function checkemail($email)
    {
        $sql = "select * from taikhoan where email = '$email'";
        $user = pdo_query_one($sql);
        return $user;
    }
    function update_user($id,$username,$firstname,$lastname, $password, $email, $address,$phone, $role){
        $sql = "update taikhoan set firstname = '$firstname', lastname = '$lastname', username = '$username', pass = '$password', email = '$email', address = '$address', phone = '$phone'";
        if($role !== ' '){
            $sql .= ", role = '$role'" ;
        }
        $sql .= " where id = '$id'";
        echo $sql;
        pdo_execute($sql);
    }

    // function loadall_taikhoan(){
    //     $sql = "select * from taikhoan order by id desc";
    //     $listuser = pdo_query($sql);
    //     return $listuser;
    // }
    function loadall_taikhoan($id,$role){
        $sql = "select * from taikhoan where 1";
        if($id != ""){
            $sql.= " and id = ". $id;
        }
        if($role !== ''){
            $sql.= " and role = ".$role;
        }
        $sql.= " order by id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }
    function loadone_taikhoan($id){
        $sql = "select * from taikhoan where id = '$id'";
        $user = pdo_query($sql);
        return $user;
    }
?>