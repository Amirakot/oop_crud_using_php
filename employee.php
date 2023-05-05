<?php
include 'header.php';

?>
<body>
     <?php include 'navbar.php'?>
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class='p-3 col mt-5 text-white bg-dark text-center'>employee</h2>
        </div>
    </div>
   
    <table class="table table-dark">
  <thead>
   <?php 
    if(count($db->read('employye'))){

   ?> 
  <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">department</th>
      <th scope="col">email</th>
       <th scope="col">edit</th>
        <th scope="col">Delte</th>

    </tr>
  </thead>
  <tbody>
   
   <?php foreach($db->read('employye') as $row): ?>
    <tr>
      <th ><?php echo strtoupper($row['id'])?></th>
      <td><?php echo strtoupper($row['name'])?></td>
      <td><?php  echo strtoupper($row['dep'])?></td>
      <td><?php echo strtoupper($row['emial'])?></td>
      <td><a href="edit.php?id=<?php echo $row['id'] ;?>"><i class="fa-regular fa-pen-to-square fs-5 "  style="color: green;"></i></a></td>
     <td><a href="delete.php?id=<?php echo $row['id'] ;?>"><i class="fa-solid fa-delete-left fs-5" style="color: red;"></i></a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
    <?php }?>




</div>
    <?php include 'footer.php'?>
    </body>
</html>