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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedbackTable"));
    $gamesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gametable"));
    ?>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Games</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                        <input placeholder="Title" type="text" name="gameTitle" required>
                        <input placeholder="Duration" type="number" name="gameDuration" required>
                        <input placeholder="Date" type="date" name="gameRelDate" required>
                        <input placeholder="Captain" type="text" name="gameCaptain" required>
                        <input placeholder="Players" type="text" name="gamePlayers" required>
                        <label>Price</label>
                        <input placeholder="Dallas Grounds" type="text" name="dallasgrounds" required><br />
                        <input placeholder="Magnolia Grounds" type="text" name="magnoliagrounds" required><br />
                        <input placeholder="Houston Grounds" type="text" name="houstongrounds" required><br />
                        <br>
                       <!-- <label>Add Poster</label>
                        <input type="file" name="gameImg" accept="image/*">-->
                        <button type="submit" value="submit" name="submit" class="form-btn">Add Game</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $insert_query = "INSERT INTO 
                            gametable (  gameImg,
                                            gameTitle,
                                            gameDuration,
                                            gameRelDate,
                                            gameCaptain,
                                            gamePlayers,
                                            dallasgrounds,
                                            magnoliagrounds,
                                            houstongrounds)
                            VALUES (        'img/" . $_POST['gameImg'] . "',
                                            '" . $_POST["gameTitle"] . "',
                                            '" . $_POST["gameDuration"] . "',
                                            '" . $_POST["gameRelDate"] . "',
                                            '" . $_POST["gameCaptain"] . "',
                                            '" . $_POST["gamePlayers"] . "',
                                            '" . $_POST["dallasgrounds"] . "',
                                            '" . $_POST["magnoliagrounds"] . "',
                                            '" . $_POST["houstongrounds"] . "')";
                           $rs= mysqli_query($con, $insert_query);
                           if ($rs) {
                            echo "<script>alert('Sussessfully Submitted');
                                  window.location.href='addGame.php';</script>";
                        }
                        }
                        ?>
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Recent Games</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Game ID</th>
                            <th>Game Title</th>
                            <th>Date</th>
                            <th>Captain</th>
                            <th>More</th>
                            
                        </tr>
                        <tbody>
                            <?php
                            $host = "localhost"; /* Host name */
                            $user = "root"; /* User */
                            $password = ""; /* Password */
                            $dbname = "game_db"; /* Database name */

                            $con = mysqli_connect($host, $user, $password, $dbname);
                            $select = "SELECT * FROM `gametable`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $ID = $row['gameID'];
                                $title = $row['gameTitle'];
                                $gamedate = $row['gameRelDate'];
                                $gamecaptain = $row['gameCaptain'];
                            ?>
                                <tr align="center">
                                    <td><?php echo $ID; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $gamedate; ?></td>
                                    <td><?php echo $gamecaptain; ?></td>
                                    <!--<td><?php echo  "<a href='deleteGame.php?id=" . $row['gameID'] . "'>delete</a>"; ?></td>-->
                                    <td><button value="DeleteGame"!" type="submit" onclick="" type="button" class="btn btn-danger"><?php echo  "<a href='deleteGame.php?id=" . $row['gameID'] . "'>delete</a>"; ?></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>