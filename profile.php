<?php
include 'includes/connection.php';
?>
<?php
session_start();
function str_openssl_dec($str, $iv)
{
    $key = 'progga1234567890#%$%$#$%$';
    $chiper = "AES-128-CTR";
    $options = 0;
    $str = openssl_decrypt($str, $chiper, $key, $options, $iv);
    return $str;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Protibaaad</title>
    <link rel="icon" type="image" href="image/icon.png">

    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/welcome.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="write_review.css">

</head>

<body>
    <?php include('includes/user_navbar.php') ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">
                <table class="table table-striped border">
                    <thead class="table-primary">
                        <tr>
                            <th></th>
                            <th>User Info</th>
                        </tr>
                    </thead>
                    <?php

                    $username =  $_SESSION['username'];
                    $sql = "SELECT * FROM  users WHERE `username`='$username'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {
                            $iv = $row['iv'];
                            $iv = hex2bin($iv);
                            $username = $row["username"];
                            $email = $row["email"];
                            $email = str_openssl_dec($email, $iv);
                    ?>
                            <tbody>
                                <tr>
                                    <th scope="row">User Name : </th>
                                    <td>
                                        <?php echo $username; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email : </th>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                        <a href="change-password.php">Update Password</a>
                                    </td>
                                </tr>
                            </tbody>

                    <?php
                        }
                    }
                    ?>

                </table>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="t1">
        <table style="width: 80%; border: 2px;">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            <tbody id="data" style="width: 80%; border: 2px;"></tbody>
        </table>

        <script>
            var ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax/profileajax.php", true);
            ajax.send();

            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    console.log(data);

                    var html = "";
                    for (var a = 0; a < data.length; a++) {
                        var Name = data[a].username;
                        var Email = data[a].email;
                        var Role = data[a].role;

                        html += "<tr>";
                        html += "<td>" + Name + "</td>";
                        html += "<td>" + Email + "</td>";
                        html += "<td>" + Role + "</td>";
                        html += "</tr>";
                    }
                    document.getElementById("data").innerHTML += html;
                }
            };
        </script>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>  <br>
    <br>
    <br>
    <br>
    <br>
    <?php include('includes/user_footer.php') ?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>