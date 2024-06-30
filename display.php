<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
    <tr><th>No</th> <th>Name</th> <th>Email</th> <th>password</th></tr>
        </thead>
        <tbody>
         <?php
    //     if($result->num_rows > 0)
        
    // {
    //     $i=1;
    //     while( $row = $result->fetch_assoc())
    //     {
    //         echo "<tr>";
    //         echo "<td>".$i++."</td>";
    //         echo "<td>".$row['name']."</td>";
    //         echo "<td>".$row['email']."</td>";
    //         echo "<td>".$row['password']."</td>";
    //         echo "</tr>";
    //     }

    // }
    // else
    // {
    //     echo "<tr><td colspan='4'>Record not found</td></tr>";
    // }

            ?>
            
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function(){
         var table  =  $("tbody");

         $.ajax({
            url : "displayphp.php",
            type : "POST",
            dataType : "json",
            success : function(response)
            {
                table.empty();
                 if(response.length > 0)
                 {
                    var i = 1;
                    $.each(response, function(index, users)
                    {
                        var row = "<tr>";
                        row+= "<td>"+ i++ +"</td>";
                        row+= "<td>"+users.name+"</td>";
                        row+= "<td>"+users.email+"</td>";
                        row+= "<td>"+users.password+"</td>";
                        row+= "</tr>";
                        table.append(row);
                    })
                 }else
                 {

                 }
            },
            error : function(xhr, status, error)
            {

            }


         })

        })
    </script>
</body>
</html>