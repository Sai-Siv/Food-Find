
<?php
include("login.php"); 
// if($_SESSION['loggedin']==true){
//     header("location:loginindex.html");
// }

if($_SESSION['name']==''){
	header("location: signup.php");
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         header {
        background-color: white; /* Set header background to white */
        color: black; /* Set text color to black */
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed; /* Make the header fixed */
        top: 0; /* Stick it to the top of the viewport */
        width: 100%; /* Make it span the full width */
        z-index: 999; /* Ensure it stays above other content */
        box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.2);
      }
      header img {
        height: 70px; /* Increase logo size */
        margin-left: 20px;
      }
      nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
      }
      nav ul li {
        margin-right: 50px;
      }
      nav ul li:last-child {
        /* Add margin to the last child of the list */
        margin-right: 40px;
      }
      nav ul li a {
        color: black; /* Set menu item text color to black */
        text-decoration: none;
        font-size: 20px;
        

      }
      nav ul li a:hover {
        text-decoration: underline;
        color: red; /* Underline the link on hover */
      }
        </style>

</head>
<body>
<header>
<img src="rectangle-20.png" alt="Logo" />
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </header>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
  
    
    



    <div class="profile">
    <!-- <section class="cover" >
        
        </section>
     -->
        <div class="profilebox" style="">
          
            <p class="headingline" style="text-align: left;font-size:30px;"> <img src="" alt="" style="width:40px; height:  height: 25px;;margin-top: 100px; padding-right: 10px; position: relative;" >Profile</p>
<!--             
            <img src="user.png" alt="" style="  width: 90px;
            height: 90px;
            /* border-radius:50% ;  */
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 10px;
             /* border: 1px solid #06C167; */
            ">
            <br> -->
              <!-- <p style="font-size: 28px;">welcome</p> -->
              <!-- <p style="color: #06C167;">username</p> -->
              <br>
              <div class="info" style="padding-left:10px;">
              <p style="">Name  :<?php echo"". $_SESSION['name'] ;?> </p><br>
              <p style="">Email :<?php echo"". $_SESSION['email'];?> </p><br>
              <p style="">Gender:<?php echo"". $_SESSION['gender'] ;?> </p><br>
               <!-- <p style="font-family: 'Times New Roman', Times, serif;">gender  :<?php echo"". $_SESSION['gender'] ;?> </p><br>  -->
              
              <a href="logout.php" style="float: left;margin-top: 6px ;border-radius:5px; background-color: #06C167; color: white;padding: ;padding-left: 10px;padding-right: 10px;">Logout</a>
              </div>
              <br>
              <br>

            
            
         <hr>
         <br>
         <p class="heading">Your donations</p>
         <!-- <p class="" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Your donations</p><br> -->
         <!-- <img src="profilecover1.jpg" alt="" width='100%' height='auto'> -->
   <div class="table-container">
         <!-- <p id="heading">donated</p> -->
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th>food</th>
            <th>Type</th>
            <th>Category</th>
            <th>date/time</th>
        </tr>
        </thead>
       <tbody>
        

         <?php
        $email=$_SESSION['email'];
        $query="select * from food_donations where email='$email'";
        $result=mysqli_query($connection, $query);
        if($result==true){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row['food']."</td><td>".$row['type']."</td><td>".$row['category']."</td><td>".$row['date']."</td></tr>";

             }
          }
       ?> 
    
        </tbody>
    </table>
         </div>
   </div>          

        </div>



    
     

    </div>


   
    
    
</body>
</html>