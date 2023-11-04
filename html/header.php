<header id="topnav">
    <a href="main-page"><img src="icon.png" alt="main page" class="logo"></a>
    
    <nav>
        <ul class="menu">
            <li>
                <a class="menuButton" href="ranking"><i class="icon-users"></i> RANKING</a>
            </li>
            <li>
                <a class="menuButton" href="rules"><i class="icon-graduation-cap"></i> RULES</a>
            </li>
            <li>
                <a class="menuButton" href="https://discord.gg/bfhe43Mh9" target="_blank"><i class="icon-comment"></i> DISCORD</a>
            </li>
            <li>
                <a class="menuButton" href="register"><i class="icon-edit"></i> REGISTER</a>
            </li>
        </ul>
    </nav>
    <?php
        $downloadLinks = json_decode(file_get_contents("files/DownloadLinks.json"), true);
        $clientDownload = $downloadLinks["clientDownload"];
        echo '<a class="menuButton downloadButton" href="' . $clientDownload . '" target="_blank"><i class="icon-download"></i> DOWNLOAD</a>';
    ?>
</header>