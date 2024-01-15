<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpage.php");
    exit;
}

require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyTweet</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="banner">MyTweet</div>
    <div class="container">
        <div class="header">
            <div class="editable-container">
                <img src="1.png" alt="User Avatar" class="header-avatar">
                <span>@</span>
                <span id="username" class="editable" contenteditable="false"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
            </div>
            <div class="button-container">
                <button id="tweetButton">Tweet</button>
                <button id="logoutButton">Logout</button>
            </div>
        </div>
    <div class="tweet">
        <div class="avatar">
            <img src="2.png" alt="User Avatar" style="width: 50px; height: 50px;">
        </div>
        <div class="content">
            <div class="username">@Mark Anthony M Cang</div>
            <div class="timestamp">420 days ago</div>
            <div class="message">Kaya rani i chat gpt</div>
        </div>
    </div>
    <div class="tweet">
        <div class="avatar">
            <img src="3.png" alt="User Avatar" style="width: 50px; height: 50px;">
        </div>
        <div class="content">
            <div class="username">@Clyde Espino</div>
            <div class="timestamp">69 days ago</div>
            <div class="message">DRINK IS FOOD! HAHAHAH</div>
        </div>
    </div>
    <div class="tweet">
        <div class="avatar">
            <img src="4.png" alt="User Avatar" style="width: 50px; height: 50px;">
        </div>
        <div class="content">
            <div class="username">@Aaron Arwita</div>
            <div class="timestamp">85 days ago</div>
            <div class="message">Alcohol is life!!! hahahaa</div>
        </div>
    </div>
    <div class="tweet">
        <div class="avatar">
            <img src="5.png" alt="User Avatar" style="width: 50px; height: 50px;">
        </div>
        <div class="content">
            <div class="username">@Ranario Rey</div>
            <div class="timestamp">150 days ago</div>
            <div class="message">I love u sir😍</div>
        </div>
    </div>
</div>
<div id="tweetInputContainer">
    <div id="tweetInputBox" class="cleafix">
        <textarea id="tweetContent" rows="4" cols="50"></textarea>
        <button id="cancelTweet" class="tweet-action-btn">Cancel</button>
        <button id="sendTweet">Post</button>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>