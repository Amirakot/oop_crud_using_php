<?php
include 'header.php'
?>
<body>
 <?php 
 $row=$db->find('employye',$_GET['id']);
 if($db->find('employye',$_GET['id'])):?>
     <?php include 'navbar.php'?>
    
     <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class='p-3 col mt-5 text-white bg-dark text-center'>delete</h2>
             
         <div class="col-md-12 mt-5">
          <h3 id="passwordHelp" class="bg-success p-2 col mt-5 text-center text-white">
        <?php echo $db->delete('employye',$row['id'])?>
        </h3>
        </div>

    </div>
   </div>
  <?php endif?>  
   <?php include 'footer.php'?>
 
</body>
</html>