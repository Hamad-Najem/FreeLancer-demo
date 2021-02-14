<table id="users" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
        </tr>
    </thead>
    
<?php
//Search
require ('config.php');
if(isset($_GET['letter'])){

    $l = '%' . $_GET['letter'] . '%';
    
    $sql = "SELECT * FROM freelancers
     WHERE user_name like '$l' OR lang like '$l' ";

     $result = mysqli_query($connection,$sql);

     if(mysqli_num_rows($result) > 0){
        while($users = mysqli_fetch_array($result)){ ?>
        <tbody>
        <tr>
            <td> <a href="profile.php?id=<?= $users[0] ?>"> <?= $users[1] ?> </a></td>
            <td align='center' > <?= $users[4]?></td>
         </tr>
         <?php
        } }else{ ?>
      <tr>
      <td align='center' ><?php echo "Not found" ;?></td>
      </tr>
      <?php
        }
            
        }
        
        ?>
 
        </tbody>
   </table>


   <?php /*

            echo '<a href="#">'. $users['user_name'].' - '.$users['lang']."</a>".'<br>';
        }
     }else{
        echo '<span> Not Found...</span>';
     }
}
?>

*/

?>