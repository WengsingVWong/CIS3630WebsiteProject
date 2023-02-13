<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Table of Faves
    </title>
    <meta name="Wengsing's Table of Favorite Things" content="A database-driven page displaying the favorite things of visitors">
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
        <li class="navlink"><a href="../favmusic/" target="_self" class="notactive">Musical Artist</a></li>
        <li class="navlink"><a href="../favbooks/" target="_self" class="notactive">Book Series</a></li>
        <li class="navlink"><a href="../favgames/" target="_self" class="notactive">Games</a></li>
        <li class="navlink"><a href="../assignments/" target="_self" class="notactive">Assignments</a></li>
        <li class="navlink"><a href="../faves/" target="_self" class="active">Table of Faves</a></li>
        <li class="navlink"><a href="http://china2020coronavirus.com/" target="_blank" class="notactive">Angela Zhu</a></li>
    </ul>
    
    <!-- DROPDOWN MENU FOR SMALLER SCREENS -->
    <ul class="smallnavigation printing">
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Menu</a>
            <div class="dropdown-content">
                <a href="/" target="_self" class="notactive">Home</a>
                <a href="../favmusic/" target="_self" class="notactive">Musical Artist</a>
                <a href="../favbooks/" target="_self" class="notactive">Book Series</a>
                <a href="../favgames/" target="_self" class="notactive">Games</a>
                <a href="../assignments/" target="_self" class="notactive">Assignments</a>
                <a href="../faves/" target="_self" class="active">Table of Faves</a>
                <a href="http://china2020coronavirus.com/" target="_blank" class="notactive">Angela Zhu</a>
            </div>
        </li>
    </ul>    
    
    <!-- CONTENT DIV -->
    <div class="contentdiv">
    <!-- MAIN HEADING -->
    <h1>
        Table of Faves
    </h1>
    
    <!-- DISPLAYING TABLE -->
    <?php
    include('database-connect.php');
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id,name,fav_music_artist,fav_books,fav_board_games,fav_video_games,added FROM faves";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
    // Output data of each row
    echo '<table class="tableoffaves">
            <tr class="tableoffavesrow">
                <th class="tableoffavesheading">Musical Artists</th>
                <th class="tableoffavesheading">Books</th>
                <th class="tableoffavesheading">Board Games</th>
                <th class="tableoffavesheading">Video Games</th>
            </tr>';
    
    while($row = $result->fetch_assoc()) {
    echo '<tr class="tableoffavesrow">
            <td class="tableoffavesdata">'.$row["fav_music_artist"].'</td>
            <td class="tableoffavesdata">'.$row["fav_books"].'</td>
            <td class="tableoffavesdata">'.$row["fav_board_games"].'</td>
            <td class="tableoffavesdata">'.$row["fav_video_games"].'</td>
          </tr>';
        
    }
    echo '</table>';
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
    
    <!-- LINK TO ADD MORE STUFF -->
    <p class="addfavestext"><a href="addfaves/" class="normallink">Add Your Faves!</a></p>
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