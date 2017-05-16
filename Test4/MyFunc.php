<?php
include_once($_SERVER['DOCUMENT_ROOT']."/image/Test3.php");
function MyFunc(){
     if(isset($_POST['name']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $country=$_POST['country'];
        $user=new User();
        $user->userAdd($name,$email,$country);
        echo "Пользователь успешно добавлен!";
        return true;
    }
   if(isset($_POST['show']))
   {
       $user=new User();
       $arr=$user->userShow();
       if(!empty($arr)){
       echo "<table id='tab'>
           <caption>Таблица пользователей</caption>
           <tr>
                <th>id</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                 <th>Город</th>
                <th>Удалить пользователя</th>
            </tr>";
        foreach($arr as $key=>$value){ 
            echo "<tr>
                    <td>".$value['id']."</td>
                    <td>".$value['user_name']."</td>
                    <td>".$value['user_email']."</td>
                    <td>".$value['country_name']."</td>
                    <td class='del'><button class='delete' id=".$value['id'].">Удалить</button></td>
                </tr>";
        }
            
            echo "</table>";
           }
   }
    if(isset($_POST['delete']))
   {
       $email=$_POST['email'];
       $user=new User();
       $user->userRemove($email);
        echo "Вы удалили одного пользователя!";
    }
   
     
}
MyFunc();
?>