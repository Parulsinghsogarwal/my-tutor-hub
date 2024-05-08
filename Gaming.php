<?php
session_start(); // Start the session

// Check if the user is logged in, redirect to login page if not logged in
function checkLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Call checkLoggedIn() on restricted pages to enforce authentication
checkLoggedIn();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gaming Section</title>
    <style>
        /* Styles for the game container */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Style to initially hide the iframes */
        .hidden {
            display: none;
        }

        /* Styles for the game card */
        .game-card {
            text-align: center;
            margin: 10px;
        }

        .game-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
            cursor: pointer;
        }

        .game-info h2 {
            margin: 10px 0 0;
            font-size: 18px;
            color: #333;
        }

        /* Container for the displayed game */
        .game-display {
            position: relative;
            z-index: 1;
        }

        .game-display iframe {
            border: none;
            width: 70vw;
            height: 70vh;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
        }

        /* Back button style */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>



<br>

    <!-- Clickable images to display respective games -->
    <div class="game-card" id="gameCard1" onclick="showGame('game1')">
        <img class="game-image"
            src="https://tse1.mm.bing.net/th?id=OIP.PLOc_G95V-3njOOpPa--swHaHa&pid=Api&rs=1&c=1&qlt=95&w=102&h=102"
            alt="Game 1">
        <div class="game-info">
            <h2>2048</h2>
        </div>
    </div>

    <div class="game-card" id="gameCard2" onclick="showGame('game2')">
        <img class="game-image"
            src="https://tse1.mm.bing.net/th?id=OIP._CWCKFlrpAVWiXq2AHXlXgHaEK&pid=Api&rs=1&c=1&qlt=95&w=175&h=98"
            alt="Game 2">
        <div class="game-info">
            <h2>Car Racing</h2>
        </div>
    </div>

    <div class="game-card" id="gameCard3" onclick="showGame('game3')">
        <img class="game-image"
            src="https://tse1.mm.bing.net/th?id=OIP.L38fbUWeHDJCAvcI3RsT9gHaHa&pid=Api&rs=1&c=1&qlt=95&w=115&h=115"
            alt="Game 3">
        <div class="game-info">
            <h2>Temple Run 2</h2>
        </div>
    </div>

    <!-- Container for the displayed game -->
    <div class="game-display" id="gameDisplay">
        <button class="back-button" onclick="goBack()">Back</button>
        <iframe id="game1Frame" class="hidden" src="https://bestgradex.com/games/2048/index.html"
            allowfullscreen></iframe>
        <iframe id="game2Frame" class="hidden" src="https://lablockedgames.com/funblocked/basketball-legends-2020/index.html"
            allowfullscreen></iframe>
        <iframe id="game3Frame" class="hidden" src="https://lablockedgames.com/funblocked/temple-run-2/index.html"
            allowfullscreen></iframe>
    </div>

    <script>
        // JavaScript function to display selected game and hide game cards
        function showGame(gameId) {
            var gameDisplay = document.getElementById('gameDisplay');
            var selectedGame = document.getElementById(gameId + 'Frame'); // Retrieve iframe ID
            var gameCards = document.getElementsByClassName('game-card');

            // Hide all game cards
            for (var i = 0; i < gameCards.length; i++) {
                gameCards[i].style.display = 'none';
            }

            // Show selected game iframe
            selectedGame.classList.remove('hidden');
        }

        // JavaScript function to go back and show game cards
        function goBack() {
            var gameCards = document.getElementsByClassName('game-card');
            var iframes = document.querySelectorAll('.game-display iframe');

            // Hide all iframes
            for (var i = 0; i < iframes.length; i++) {
                iframes[i].classList.add('hidden');
            }

            // Show all game cards
            for (var i = 0; i < gameCards.length; i++) {
                gameCards[i].style.display = 'block';
            }
        }
    </script>
</body>

</html>
