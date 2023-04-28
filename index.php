<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>SAU Games</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM gametable";
    ?>
    <header></header>
    <div id="home-section-1" class="game-show-container">
        <h1>Currently Showing</h1>
        <h3>Book a game now</h3>

        <div class="games-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i <= 5; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '<div class="game-box">';
                        echo '<img src="' . $row['gameImg'] . '" alt=" ">';
                        echo '<div class="game-info ">';
                        echo '<h3>' . $row['gameTitle'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['gameID'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<h4 class="no-annot">No Booking to our games right now</h4>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>

    <div id="home-section-2" class="services-section">
        <h1>How it works</h1>
        <h3>3 Simple steps to book your favourit game!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite game</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your tickets</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your seats & Enjoy watching</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>
    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Explore new games</h1>
        <h3>Now playing</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/game-poster-6.jpg" alt="">
                <div class="trailer-item-info" data-video="QXhV148EryQ">
                    <h3>Football</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/game-poster-3.jpg" alt="">
                <div class="trailer-item-info" data-video="1WEyUZ1SpHY">
                    <h3>Chess</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/game-poster-5.jpg" alt="">
                <div class="trailer-item-info" data-video="oyxhHkOel2I">
                    <h3>Tennis</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/game-poster-4.jpg" alt="">
                <div class="trailer-item-info" data-video="TKt6JUk9T_8">
                    <h3>Badminton</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/game-poster-2.jpg" alt="">
                <div class="trailer-item-info" data-video="VwII4y5vpyU">
                    <h3>Cricket</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/game-poster-1.jpg" alt="">
                <div class="trailer-item-info" data-video="0_ti_tbvFYs">
                    <h3>Baseball</h3>
                    <!-- <i class="far fa-3x fa-play-circle"></i> -->
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>