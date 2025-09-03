<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>

</head>
<body>
    <div class="container-fluid form-org" id="registry-form">
        <div class="container ">
            <form class="container student_form" action="process.php" method="POST">
                <legend>
            <h1 class=""  style=" text-align:center; font-family: Verdana; font-size:20px;color: white;" >STUDENT'S FORM</h1></legend><br>
            <label>Fullname</label>
            <input type="text" name="fullname" placeholder="Enter your name" id="name"><br><br>
            <label> Email</label>
            <input type="email" name="email" placeholder="Enter your Email" id="email"><br><br>
            <label> Department</label>
            <input type="text" name="department" placeholder="Enter your department" id="password"><br><br>
            <label> Matric Number</label>
            <input type="text" name="matric_number" placeholder="Enter your matric number" id="confirmPassword"><br><br>
            

                     
            <div class="submit">
                <button class="submit-btn" type="submit" name="submit">Submit</button>
                
                
            </div>    
        </form>
    </div>
</div>

</body>
</html>