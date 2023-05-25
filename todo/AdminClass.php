<?php

class AdminClass{


    public $user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function wyswietluserow():void{
        include 'db.php';
        $query = "SELECT * FROM `users` WHERE 1";
        $select = mysqli_query($connection, $query);
        if(mysqli_num_rows($select)<=0){
            echo "There is no other user besides you";
        }else{
            echo"<div class='table'> 
                <table table-bordered border-primary>
                <thead>
                            <tr>
                            <th scope = 'col' > Username </th >
                            <th scope = 'col' > Email </th >
                            <th scope = 'col' > Password </th>
                            <th scope = 'col' > Admin </th>
                            <th scope = 'col' > Delete Account </th >
                        </tr>
                        </thead>
                        <tbody>
                ";
            while ($r=mysqli_fetch_assoc($select)){
                echo "
            <tr>
                <form id='editusers' action='AdminPanel.php?panel=users' method='post' enctype='multipart/form-data'> 
                <td><input type='text' class='form-control' id='edituser' name='edituser' value='$r[username]'></td>
                <td><input type='text' class='form-control' id='editmail' name='editmail' value='$r[email]'></td>
                <td><input type='text' class='form-control' id='edithaslo' name='edithaslo' value='$r[password]'></td>
                <td><input type='text' class='form-control' id='editadmin' name='editadmin' value='$r[rank]'></td>
                <td><form action='AdminPanel.php?panel=users' method='post'> <input type='hidden' name='iduser' value='$r[id]'><input id='zmieneditbutton' type='submit' name='editusers' value='Edit!' class='zaaktualizujdanebutt'></form></td>
                <td><form action='AdminPanel.php?panel=users' method='post'> <input type='hidden' name='iduser' value='$r[id]'>  <input name='deluser'type='submit' value='delete'> </form></td>
            </tr>
        ";
            } echo "</tbody> </table> </div>";
        }
    }
    public function listatodo():void{
        include 'db.php';
        $query = "SELECT * FROM `todolist`";
        $select = mysqli_query($connection, $query);
        if(mysqli_num_rows($select)<=0){
            echo "no tasks available";
        }else{
            echo"<div class='table'> 
                <table table-bordered border-primary>
                <thead>
                            <tr>
                            <th scope = 'col' > ID </th>
                            <th scope = 'col' > User </th >
                            <th scope = 'col' > title </th>
                            <th scope = 'col' > desc </th>
                            <th scope = 'col' > status </th>
                            <th scope = 'col' > date </th>
                            <th scope = 'col' > Edit </th>
                            <th scope = 'col' > Delete Todo </th >
                        </tr>
                        </thead>
                        <tbody>
                ";
            while ($r=mysqli_fetch_assoc($select)){
                echo "
            <tr>
                <form id='edittodos' action='AdminPanel.php?panel=listtodo' method='post' enctype='multipart/form-data'> 
                <td>$r[id]</td>
                <td>$r[user]</td>
                <td><input type='text' class='form-control' id='edittytul' name='edittytul' value='$r[tytul]'></td>
                <td><form action='AdminPanel.php?panel=listtodo' method='post'> <textarea maxlength='1000' id='editopis' name='editopis' rows='3' cols='50'>$r[opis] </textarea></td>
                <td><select name='editstatus' id='editstatus'><option value='ToDo'>$r[status]</option><option value='InProgress'>In Progress</option><option value='Done'>Done</option></td>
                <td>".date("d-m-Y",$r['date'])."</td>
                <td><form action='AdminPanel.php?panel=listtodo' method='post'><input type='hidden' name='idlist' value='$r[id]'><input id='zmienedittodobutton' type='submit' name='edittodo' value='Edit!' class='zaaktualizujdanetodobutt'></form></td>
                <td><form action='AdminPanel.php?panel=listtodo' method='post'><input type='hidden' name='idlist' value='$r[id]'><input name='deltodo'type='submit' value='delete'></form></td>
            </tr>
        ";
            } echo "</tbody> </table> </div>";
        }
    }
}
//     <td>$r[id]</td>
//     <td>$r[user]</td>
//     <td>$r[tytul]</td>
//     <td>$r[opis]</td>
//     <td>$r[date]</td>
//     <td><form action='AdminPanel.php?panel=listtodo' method='post'> <input type='hidden' name='idlist' value='$r[id]'>  <input name='deltodo'type='submit' value='delete'> </form></td>
// }       