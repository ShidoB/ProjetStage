<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./tools/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://rawgit.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">




   
    <title>LCS - Stages SIO</title>
</head>
<body>
    <?php
        if(isset($_SESSION['login'])){
    ?>
    <div id="root">
        <div id="topnav" class="topnav">
            
            <h1 class="homeTitle"><a  href="./?action=defaut">LCS - Stages SIO</a></h1>

            <div class="menu">            

            <!-- Classic Menu -->
                <nav role="navigation" id="topnav_menu">
                    
                    <a class="topnav_link" href="./?action=defaut">Accueil</a>
                    <a class="topnav_link" href="./?action=mesInfos">Modifier les informations</a>
                    <a class="topnav_link" href="./?action=stage">Stage</a>                                       
                    <a class="topnav_link" href="./?action=logout">Se déconnecter</a>

                    
                </nav>
            </div>

                <a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
                <!-- Some spans to act as a hamburger -->
                <span></span>
                <span></span>
                <span></span>
                </a>

                <!-- Responsive Menu -->
            <nav role="navigation" id="topnav_responsive_menu">
                <ul>
                    <li><a href="./?action=defaut">Accueil</a></li>
                    <li><a href="./?action=mesInfos">Modifier les informations</a></li>
                    <li><a href="./?action=logout">Se déconnecter</a></li>
                </ul>
            </nav>
        </div>
    </div>
<?php } ?>


