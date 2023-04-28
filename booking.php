<!DOCTYPE html>
<html lang="en">
<?php
$id = $_GET['id'];
//conditions
if ((!$_GET['id'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}
include "connection.php";
$Query = "SELECT * FROM gametable WHERE gameID = $id";
$ImageById = mysqli_query($con, $Query);
$row = mysqli_fetch_array($ImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['gameTitle']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
             <div class="-box">
                <?php
                echo '<img src="' . $row['gameImg'] . '" alt="">';
                ?>
            </div> 
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['gameTitle']; ?></div>
            <div class="game-information">
                <table>
                    <tr>
                        <td>DURATION</td>
                        <td><?php echo $row['gameDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>GAME DATE</td>
                        <td><?php echo $row['gameRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>CAPTAIN</td>
                        <td><?php echo $row['gameCaptain']; ?></td>
                    </tr>
                    <tr>
                        <td>PLAYERS</td>
                        <td><?php echo $row['gamePlayers']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="main-hall">Dallas Grounds</option>
                        <option value="vip-hall">Magnolia Grounds</option>
                        <option value="private-hall">Houston Grounds</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="Front Seat">Front Seat</option>
                        <option value="VIP Seat">VIP Seat</option>
                        <option value="Back Seat">General Seat</option>
                        <option value="General Seat">Back Seat</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3"><?php echo $row['gameRelDate']; ?></option>
                        
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>
                    <input placeholder="email" type="email" name="email" required>
                    <input type="hidden" name="game_id" value="<?php echo $id; ?>">



                    <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>

                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>