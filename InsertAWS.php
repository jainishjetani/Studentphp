<html>

    <head>
        <title>Add New Record in MySQL Database</title>
    </head>

    <body>
        <?php
        if (isset($_POST['add'])) {
//            $dbhost = 'localhost';
//            $dbuser = 'root';
//            $dbpass = '';
//            $dbname = 'de';
            $dbhost = 'admin@database-1.c6jevgf51ssc.us-east-1.rds.amazonaws.com:3306';
            $dbuser = 'admin';
            $dbpass = '123admin';
            $dbname = 'StudentDB';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if (!$conn) {
                die('Could not connect: ' . mysql_error());
            }

            $stud_name = $_POST['stud_name'];
            $stud_email = $_POST['stud_email'];
            $stud_city = $_POST['stud_city'];
            $stud_phone = $_POST['stud_phone'];
            $stud_department = $_POST['stud_department'];


            $sql = "INSERT INTO studenttable " . "(name,email,city,phone,department) " . "VALUES('$stud_name','$stud_email','$stud_city','$stud_phone','$stud_department')";

            $retval = mysqli_query($conn, $sql);

            if (!$retval) {
                die('Could not enter data: ' . mysql_error());
            }

            echo "Entered data successfully\n";

            mysqli_close($conn);
        } else {
            ?>




            <form method = "post" action = "<?php $_PHP_SELF ?>">
                <table width = "400" border = "0" cellspacing = "1" 
                       cellpadding = "2">

                    <tr>
                        <td width = "100">Name</td>
                        <td><input name = "stud_name" type = "text" 
                                   id = "stud_name"></td>
                    </tr>

                    <tr>
                        <td width = "100">Email Address</td>
                        <td><input name = "stud_email" type = "text" 
                                   id = "stud_email"></td>
                    </tr>

                    <tr>
                        <td width = "100">City</td>
                        <td><input name = "stud_city" type = "text" 
                                   id = "stud_city"></td>
                    </tr>
                    <tr>
                        <td width = "100">Phone</td>
                        <td><input name = "stud_phone" type = "text" 
                                   id = "stud_phone"></td>
                    </tr>
                    <tr>
                        <td width = "100">Department</td>
                        <TD width="50%"><select name="stud_department" id = "stud_department"> 
                                <OPTION value="MCA">MCA</OPTION>
                                <OPTION value="BBA">BBA</OPTION>
                                <OPTION value="B.com">B.com</OPTION>    
                            </select></TD>
                    </tr>

                    <tr>
                        <td width = "100"> </td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td width = "100"> </td>
                        <td>
                            <input name = "add" type = "submit" id = "add" 
                                   value = "Add Student">
                        </td>
                    </tr>

                </table>
            </form>

            <?php
        }
        ?>

    </body>
</html>