<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}
include "connection.php";
$Query = "SELECT gameRelDate FROM gametable ;

$row = $Query;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add entry</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "game_db");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    $gamesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM gametable"));
    ?>

    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>ADD ENTRY</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">


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
                                <option value="Back Seat">Back Seat</option>
                                <option value="General Seat">General Seat</option>
                            </select>

                            <select name="date" required>
					
                			if (mysqli_num_rows($rows) > 0) {
                                <option value="12-3"><?php echo $row['gameRelDate']; ?></option>
					
					}
                        
                            </select>

                            <select name="hour" required>
                                <option value="" disabled selected>TIME</option>
                                <option value="09-00">09:00 AM</option>
                                <option value="12-00">12:00 AM</option>
                                <option value="15-00">03:00 PM</option>
                                <option value="18-00">06:00 PM</option>
                                <option value="21-00">09:00 PM</option>
                                <option value="24-00">12:00 PM</option>
                            </select>

                            <input placeholder="First Name" type="text" name="fName" required>

                            <input placeholder="Last Name" type="text" name="lName">

                            <input placeholder="Phone Number" type="text" name="pNumber" required>
                            <input placeholder="Email" type="email" name="email" required>
                            <input placeholder="Game ID" type="text" name="game_id">
                            
                            <input placeholder="Amount" type="text" name="cash" required>

                            <button type="submit" value="submit" name="submit" class="form-btn">ADD ENTRY</button>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>