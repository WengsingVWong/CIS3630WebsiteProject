<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Add Your Faves
    </title>
    <meta name="Add Your Favorite Things" content="A page where you can enter your favorite things into Wengsing's Table of Faves">
    <meta name="robots" content="noindex, no follow">
    
    <!-- FAVICON -->
    <link href="/media/favicon.png" rel="icon" type="image/x-icon">
    
    <!-- CSS -->
    <link href="/css/wengsingwong.css" rel="stylesheet">

</head>
<body>
    <!-- BANNER -->
    <header id="wwbanner">
        <p id="wwbannertext">
            Wengsing's World
        </p>
    </header>
    
    <!-- STANDARD MENU -->
    <ul class="standardnavigation printing">
        <li class="navlink"><a href="/" target="_self" class="notactive">Home</a></li>
        <li class="navlink"><a href="../../favmusic/" target="_self" class="notactive">Musical Artist</a></li>
        <li class="navlink"><a href="../../favbooks/" target="_self" class="notactive">Book Series</a></li>
        <li class="navlink"><a href="../../favgames/" target="_self" class="notactive">Games</a></li>
        <li class="navlink"><a href="../../assignments/" target="_self" class="notactive">Assignments</a></li>
        <li class="navlink"><a href="../../faves/" target="_self" class="active">Table of Faves</a></li>
        <li class="navlink"><a href="http://china2020coronavirus.com/" target="_blank" class="notactive">Angela Zhu</a></li>
    </ul>
    
    <!-- DROPDOWN MENU FOR SMALLER SCREENS -->
    <ul class="smallnavigation printing">
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Menu</a>
            <div class="dropdown-content">
                <a href="/" target="_self" class="notactive">Home</a>
                <a href="../../favmusic/" target="_self" class="notactive">Musical Artist</a>
                <a href="../../favbooks/" target="_self" class="notactive">Book Series</a>
                <a href="../../favgames/" target="_self" class="notactive">Games</a>
                <a href="../../assignments/" target="_self" class="notactive">Assignments</a>
                <a href="../../faves/" target="_self" class="active">Table of Faves</a>
                <a href="http://china2020coronavirus.com/" target="_blank" class="notactive">Angela Zhu</a>
            </div>
        </li>
    </ul>    
    
    <!-- CONTENT DIV -->
    <div class="contentdiv">
    
    <!-- MAIN HEADING -->
    <h1>
        Add Your Faves
    </h1>
    
    <!-- SUBMIT ENTRIES TO DATABASE -->
    <?php
    include('../database-connect.php');
    
    if(isset($_POST['add']))
    {

    $conn = mysql_connect($servername, $username, $password, $dbname );
    if(! $conn )
    {
    die('Could not connect: ' . mysql_error());
    }

    if(! get_magic_quotes_gpc() )
    {
    $faves_name = addslashes ($_POST['faves_name']);
    $faves_music_artist = addslashes ($_POST['fav_music_artist']);
    $faves_books = addslashes ($_POST['fav_books']);
    $faves_board_games = addslashes ($_POST['fav_board_games']);
    $faves_video_games = addslashes ($_POST['fav_video_games']);
    }
    else
    {
    $faves_name = $_POST['faves_name'];
    $faves_music_artist = $_POST['fav_music_artist'];
    $faves_books = $_POST['fav_books'];
    $faves_board_games = $_POST['fav_board_games'];
    $faves_video_games = $_POST['fav_video_games'];
    }

    $sql = "INSERT INTO faves". "(name, fav_music_artist, fav_books, fav_board_games, fav_video_games, added) ". "VALUES('$faves_name','$faves_music_artist','$faves_books', '$faves_board_games', '$faves_video_games', NOW())";
    
    mysql_select_db($dbname);
    $retval = mysql_query( $sql, $conn );
    if(! $retval )
    {
    die('Could not enter data: ' . mysql_error());
    }
    echo '<p>Thanks for sharing! <a href="../../faves/" class="normallink">Click Here To Return To The Table of Faves</a>!</p>';
    mysql_close($conn);
    }
    else
    {
    ?>
    
    <!-- IMPORTANT NOTE FOR FILLING OUT THE FORM -->
    <p>
        Note: All fields marked with an asterisk (*) are required and cannot be left blank.
    </p>
    
    <!-- FORM TO INPUT YOUR FAVES INTO TABLE -->
    <div class="formcontainer">
    <form method="post" action="../addfaves/">
        <div class="row">
            <div class="col25">
                <label for="faves_name" class="labeltext">*Name:</label>
            </div>
            <div class="col75">
                <input type="text" id="faves_name" name="faves_name" required="required" placeholder="E.g. John Doe" size="50" class="favefield">
            </div>
        </div>
        <div class="row">
            <div class="col25">
                <label for="fav_music_artist" class="labeltext">*Favorite Musical Artist:</label>
            </div>
            <div class="col75">
                <input type="text" id="fav_music_artist" name="fav_music_artist" required="required" placeholder="E.g. Owl City" size="50" class="favefield">
            </div>
        </div>
        <div class="row">
            <div class="col25">
                <label for="fav_books" class="labeltext">*Favorite Book/Series:</label>
            </div>
            <div class="col75">
                <input type="text" id="fav_books" name="fav_books" required="required" placeholder="E.g. Artemis Fowl" size="50" class="favefield">
            </div>
        </div>
        <div class="row">
            <div class="col25">
                <label for="fav_board_games" class="labeltext">Favorite Board Game:</label>
            </div>
            <div class="col75">
                <input type="text" id="fav_board_games" name="fav_board_games" placeholder="E.g. Pandemic" size="50" class="favefield">
            </div>
        </div>
        <div class="row">
            <div class="col25">
                <label for="fav_video_games" class="labeltext">Favorite Video Game:</label>
            </div>
            <div class="col75">
                <input type="text" id="fav_video_games" name="fav_video_games" placeholder="E.g. Pokemon SoulSilver" size="50" class="favefield">
            </div>
        </div>
        <div class="row">
            <input type="submit" id="add" name="add" value="Submit Your Faves" class="favesubmit">
        </div>
    </form>
    </div>
    <?php
    }
    ?>
    </div>
    <hr>
    
    <!-- FOOTER -->
    <footer>
        <p id="copyright">
            Copyright © 2020 Wengsing Wong<br>
            Can't find something? Try this <a href="/mysitemap/" class="normallink">site map</a>.
        </p>
    </footer>
</body>