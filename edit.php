<?php
include 'header.php'
?>
<body>
     <?php include 'navbar.php'?>
  <?php  if($db->find('employye',$_GET['id']))?>
<?php
$row=$db->find('employye',$_GET['id']);
$idd=$row['id'];
$error='';
$sucess='';
$erroremail='';

$deparatments=array('it','cs','business');
 $errorrdep='';
if(isset($_POST['submit'])){
//عقمت نقيت ال filed
$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$deparatment=filter_var($_POST['dep'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
 
// validate
if(empty($name)or empty($deparatment) or empty($email)  ){
 $error='please fill  filed';   
}
else{
if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $deparatment=strtolower($deparatment);
    if(in_array($deparatment,$deparatments)){
   

//catch fileds and send to database
//hash passowrd

//update 

echo $idd;

$sql="UPDATE  employye set `name`='$name', `emial`='$email', `dep`= '$deparatment'
 WHERE `id`= $idd";


$sucess=$db->update($sql);
     
    }
    else{
        $errorrdep='this deparment not found';
    }
}
else{
    $erroremail='plese type valid email';  
}
}
}?>
     <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class='p-3 col mt-5 text-white bg-dark text-center'>edit</h2>
        </div>
    </div>
   </div>
   <?php if(isset($_GET['id'])&&is_numeric($_GET['id'])):?>

    <form class='border w-75 m-auto mt-5 mb-5 p-5' method='post' action='<?php $_SERVER['PHP_SELF']?>'>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" name='name' value="<?php echo $row['name']?>" >
    <div class="col-sm-3">
    <?php if($error !=''){?>
       <small id="passwordHelp" class="text-danger">
        <?php echo $error?>
        </small>
  </div><?php
}?>
</div>
 <div class="mb-3">
    <label for="" class="form-label">Departament</label>
    <input type="text" class="form-control" name='dep'value="<?php echo $row['dep']?>" >
   <div class="col-sm-3">
    <?php if($error !=''){?>
       <small id="passwordHelp" class="text-danger">
           <?php echo $error?>
        </small>
  </div><?php
}else?>
<small id="passwordHelp" class="text-danger">
<?php echo $errorrdep?>
</small>
</div>
    
    
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' value="<?php echo $row['emial']?>">
 <div class="col-sm-3">
    <?php if($error !='' ){?>
       <small id="passwordHelp" class="text-danger">
        <?php echo $error?>
        </small>
  </div><?php
}else?>
  <small id="passwordHelp" class="text-danger">
<?php echo $erroremail?>
</small>
</div>
 
  
  <button type="submit" name="submit" class="btn btn-dark mt-5 mb-5">Submit</button>
</form>

   <?php endif?>
</div>
</div>
   <?php include 'footer.php'?>
    </body>
</html>