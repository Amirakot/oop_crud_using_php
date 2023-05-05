<?php

include 'header.php';

?>
<body>
     <?php include 'navbar.php'?>
     
<?php
$error='';
$sucess='';
$erroremail='';
$errorpassowrd='';
$deparatments=array('it','cs','business');
 $errorrdep='';
if(isset($_POST['submit'])){
//عقمت نقيت ال filed
$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$deparatment=filter_var($_POST['dep'],FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$password=filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
// validate
if(empty($name)or empty($deparatment) or empty($email) or empty($password) ){
 $error='please fill  filed';   
}
else{
if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $deparatment=strtolower($deparatment);
    if(in_array($deparatment,$deparatments)){
     if(strlen($password)>6){
$errorpassowrd='';

//catch fileds and send to database
//hash passowrd
$haspassword=$db->hashpass($password);
//insert 
$sql="INSERT INTO employye (`name`, `emial`, `dep`, `pass`)
VALUES ('$name', '$email', '$deparatment', '$haspassword')";
$sucess=$db->insert($sql);
     } 
     else{
        $errorpassowrd='the length of password must be more than 6';
     }  
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
            <h2 class='p-3 col mt-5 text-white bg-dark text-center'>add employee</h2>
        </div>
        <?php if($sucess !=''){?>
         <div class="col-md-12 mt-5">
          <h3 id="passwordHelp" class="bg-success p-2 col mt-5 text-center text-white">
        <?php echo $sucess?>
        </h3>
       
        
</div>
<?php
}?>
    <form class='border w-75 m-auto mt-5 mb-5 p-5' method='post' action='<?php $_SERVER['PHP_SELF']?>'>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" name='name' >
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
    <input type="text" class="form-control" name='dep' >
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
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'>
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
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
 <div class="col-sm-3">
    <?php if($error !=''){?>
       <small id="passwordHelp" class="text-danger">
          <?php echo $error?>
        </small>
  </div><?php
}else?>
 <small id="passwordHelp" class="text-danger">
          <?php echo $errorpassowrd?>
        </small>
</div>
  
  <button type="submit" name="submit" class="btn btn-dark mt-5">Submit</button>
</form>

    </div>

   </div>
 
    </body>
   
    </html>