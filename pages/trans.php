<br>


<div class="m-4">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="#"  class="nav-link active">Invoice</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Profile</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Messages</a>
        </li>
    </ul>
</div>
<div class="container" style="

margin:4px, 4px;
                padding:4px;
                background-color: wheat;
                
                height: 70%;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;

">


    <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                   <th>Id</th>
                <th>Addres</th>
                <th>Amount</th>
                <th>Code</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>

<?php
$con = Database::getConn();
// echo $id;
$stm = $con->prepare("SELECT * FROM `invoices` WHERE `uid`=:id");
$stm->bindParam(":id", $id);
$stm->execute();
// echo $stm->rowCount();
if ($stm->rowCount()>0) {
    for ($i=0; $i < $stm->rowCount(); $i++) { 
       $row=$stm->fetch();
    //    echo $i;
?>
                <tr>
                  <td><?php echo $i  ?></td>  
                  <td><?php echo $row->address;  ?></td>  
                  <td><?php echo "USD". $row->price;  ?></td>  
                  <td><?php echo $row->code ; ?></td>  
                  <td><?php echo $row->status ;?></td>  
                </tr>


                <?php

       
    }
}
?>
            </tbody>
        </table>

</div>