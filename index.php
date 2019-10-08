<html>
    <head>
        <title>My first PHP Website</title>
        <style>
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
          padding: 16px;
          margin:16px 16px 16px 16px;
          text-align: center;
          background-color: #f1f1f1;
        }
        </style>
    </head>
    <body>
        <?php

            $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //echo "Connected successfully ";
            //uname is username entered in form
            //username is attribute of proffessor which is unique.
            //$uname=1;
            $q1="select * from students";
            $query1=mysqli_query($conn,$q1);
            while($row = mysqli_fetch_array($query1,MYSQLI_ASSOC))
            {
            //echo print_r($row);   used to print entire row.
            //echo nl2br("\n{$row['First']} {$row["Middle"]} {$row["Last"]}");
            echo('
              <a href="" >
                <div class="card">
                  <p>  '.$row["First"].' '.$row["Middle"].' '.$row["Last"]. '</p>
                </div>
              </a>
            ');
            }
        ?>
    </body>
</html>
