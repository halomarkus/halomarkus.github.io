<?php
require 'CONNECT.php';//externe PHP Dateien über HTTP einbinden
//Sollte die Funktion die Datei in keinem der Pfade finden,
// wird ein FATAL ERROR erzeugt. Das Skript wird abgebrochen.
?>
 <h3><a href="ADMIN.php?view">View Users:</a></h3>
<?php
//view ist vom link wird in der URL-Zeile des
//Browser die Variablen + ihrem Wert angezeigt:
//dies kann manipuliert werden ||GET ist begrenzt, POST nicht
if(isset($_GET['view'])){
  echo "
  <table width='800' border='1' bgcolor='yellow'>
  <tr align='center'>
  <th>User No:</th>
  <th>Username:</th>
  <th>User Email:</th>
  <th>User Pass:</th>
  <th>User Age:</th>
  <th>Firstname:</th>
  <th>Lastname:</th>
  <th>Delete User:</th>
  <th>Update User:</th>
  </tr>
  ";
  $select_user="select * from tprojekt_2";
  foreach ($newcon->query($select_user) as $row) {
    $u_id=$row['id'];
    $u_name=$row['username'];
    $u_email=$row['email'];
    $u_pass=$row['password'];
    $u_age=$row['age'];
    $u_first=$row['firstname'];
    $u_second=$row['secondname'];
    echo "

    <tr align='center'>
    <td>$u_id</td>
    <td>$u_name</td>
    <td>$u_email</td>
    <td>$u_pass</td>
    <td>$u_age</td>
    <td>$u_first</td>
    <td>$u_second</td>
    <td><a href='ADMIN.php?del=$u_id'>Delete</a></td>
    <td><a href='ADMIN.php?edit=$u_id'>Edit</a></td>
    </tr>";
  }//muss getrennt sein wegen schleife
  echo "
  </table>";
}
//Deleting Data von dem table
if(isset($_GET['del']))
{
  $del_id=$_GET['del'];//geklickte id

  $delete_user="delete from tprojekt_2 where id='$del_id'";

  $run_delete=$newcon->query($delete_user);
//javascript
  if($run_delete)
  {
    echo "<script>alert('A user has been deleted!')</script>";
    echo "<script>window.open('ADMIN.php?view','_self')</script>";
  }
}
//bearbeiten data inside table
if(isset($_GET['edit']))
{
  $edit_id=$_GET['edit'];//geklickte id
  $get_user="select * from tprojekt_2 where id='$edit_id'";

  $run_user=$newcon->query($get_user);
  //holt ein assoziatives und ein numerisches Array (ist default)
  $row_user=$run_user->fetch(PDO::FETCH_BOTH);

  $user_id=$row_user['id'];
  $user_name=$row_user['username'];
  $user_email=$row_user['email'];
  $user_pass=$row_user['password'];
  $user_age=$row_user['age'];
  $user_first=$row_user['firstname'];
  $user_second=$row_user['secondname'];

  echo "
  <form action='' method='post'>
  <b>Edit Name:</b><input type='text' name='u_name' value='$user_name'/><br/>
  <b>Edit Email:</b><input type='text' name='u_email' value='$user_email'/><br/>
  <b>Edit Pass:</b><input type='password' name='u_pass' value='$user_pass'/><br/>
  <b>Edit Age:</b><input type='number' name='u_age' value='$user_age'/><br/>
  <b>Edit Fname:</b><input type='text' name='u_first' value='$user_first'/><br/>
  <b>Edit Sname:</b><input type='text' name='u_second' value='$user_second'/><br/>
  <input type='submit' name='update' value='update user'/>
  </form>";
}
//Updating data code
if(isset($_POST['update']))
{
  $update_id= $user_id;

  $name= $_POST['u_name'];
  $email= $_POST['u_email'];
  $pass= $_POST['u_pass'];
  $age= $_POST['u_age'];
  $first= $_POST['u_first'];
  $second= $_POST['u_second'];

  $update_user="update tprojekt_2 set username='$name', email='$email', password='$pass', age='$age', firstname='$first', secondname='$second' where id='$update_id'";
//Zum Abrufen der Fehlermeldung
  $run_update=$newcon->query($update_user) or die( $newcon->errorInfo()[2] );
//javascript
  if($run_update)
  {
    echo "<script>alert('A user has been Updated!')</script>";
    echo "<script>window.open('ADMIN.php?view','_self')</script>";
  }
}
?>
