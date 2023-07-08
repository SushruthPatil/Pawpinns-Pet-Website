<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library</title>
        <style>
.center {
  text-align: center;
  
}
</style>
    </head>
    <body>
       
        <h1>Welcome to Library</h1>
        <?php
        
         if (isset($_POST['keyword'])) {
        $name = $_POST['keyword'];	
       
        
        
        $con = mysqli_connect("localhost","root","root","library");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
			 $sql="select * from book where BookName LIKE '%$name%'";                    
                    $result=mysqli_query($con,$sql);
                    
                    
                    echo "<table style='width:50%' border='1'>
                        <tr>
                        <th>book_id</th>
                        <th>name</th>
                        <th>year</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["BookID"]."</center></td>";
                                echo "<td><center>".$row["BookName"]."</center></td>";
                                echo "<td><center>".$row["Year"]."</center></td>";
                                echo "<td><center>".$row["Author"]."</center></td>";
                                echo "</tr>";


                            }
                        }
                            else{
                                echo "Book not found";
                            }

                        
                      
	      }
        
        session_start();
        $username = $_SESSION['username'];
       echo  "Hi,". "$username"."</br>"; 
        
        echo " List of Books in library";
        
        
        
        $con = mysqli_connect("localhost","root","root","library");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    
                    $sql="select * from book ";                    
                    $result=mysqli_query($con,$sql);
                    
                    
                    echo "<table style='width:50%' border='1'>
                        <tr>
                        <th>book_id</th>
                        <th>name</th>
                        <th>year</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["BookID"]."</center></td>";
                                echo "<td><center>".$row["BookName"]."</center></td>";
                                echo "<td><center>".$row["Year"]."</center></td>";
                                echo "<td><center>".$row["Author"]."</center></td>";
                                echo "</tr>";


                            }
                        }
                            else{
                                echo "error";
                            }

        
        ?>
        
  <form role="form" id="templatemo-preferences-form" name="registration" action="" method="post">
            <div class="center">
            <input type="text" id="lastName4" placeholder="Search" name="keyword" required><br/>
            <br/>
            <button type="submit"  name="submit" value="Register" >Search</button>
             </div>
        </form>
    </body>
</html>
