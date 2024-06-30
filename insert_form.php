 




 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=email], input[type=password] {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form id="registrationForm">
            <div class="form-group">
                <label for="s_name">Name:</label>
                <input type="text" name="s_name" id="s_name" placeholder="Enter Name" >
                <span class="error" id="error_s_name">  </span>
            </div>
            <div class="form-group">
                <label for="s_email">Email:</label>
                <input type="email" name="s_email" id="s_email" placeholder="Enter Email" >
                <span class="error" id="error_s_email"></span>
            </div>
            <div class="form-group">
                <label for="s_password">Password:</label>
                <input type="password" name="s_password" id="s_password" placeholder="Enter Password" >
                <span class="error" id="error_s_password"></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
            <div id="responseMessage" class="error"></div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
 <script>
     $(document).ready(function()
     {
        $("#registrationForm").on("submit",function(sumona)
    {
        sumona.preventDefault();

        // var  formData = {
        //     s_name : $("#s_name").val(),
        //     s_email : $("#s_email").val(),
        //     s_password : $("#s_password").val()
        // };

        var formData = $(this).serialize();

        $.ajax({
            url : "code.php",
            type : "POST",
            data :formData,
            dataType : "json",
            success : function(data)
            {
                if(data.success)
                {
                    
                    $("#responseMessage").text(data.message);
                    $("#registrationForm")[0].reset();
                }else
                {
                    if(data.errors)
                    {
                        if(data.errors.s_name)
                        {
                            $("#error_s_name").text(data.errors.s_name);
                           
                        }

                        if(data.errors.s_email)
                        {
                            $("#error_s_email").text(data.errors.s_email);
                        }

                        if(data.errors.s_password)
                        {
                            $("#error_s_password").text(data.errors.s_password);
                        }
                    }
                }
            },
            error : function(xhr, status, error)
            {
                alert("error:"+error);
            }


        });




    } );
        

     });
 </script>
 
</body>
</html>
