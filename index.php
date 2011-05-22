
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>
            
        </title>
    </head>
    <body>

        <div class="header">
            <div class="headerContainer">
                <div class="logo"></div>
                    <div class="searchbar">
                            <input type="text" placeholder='Type in a zip code ...'></input>
                            <div class="searchbutton"> <img src="images/search.png"></div>

                        <div class="locateicon">
<!--                            <img src="images/local.png">-->
                        </div>
                    </div>
            </div>
        </div>
        <div class="subbar">
            <div class="socialbuttons">
                <a href="#"><img src="images/fb.png"></a>
                <a href="#"><img src="images/twitter.png"></a>

            </div>
            <div class="distance">
                <div class="distancetitle"></div>
                <div class="distancebar"></div>
                <div style="clear:both"></div>
            </div>
        </div>
        <div class="map">
            <?php include('mapscript.php')?>
        </div>
            <div class="bottom">

                <div class="sectionbar">
                    <div class="bottomSection">
                        <h2 style="padding-left:10px;padding-top:10px;"><img src="images/tweetshead.png"></h2>
                    </div>
                    <div class="bottomSection">
                       <h2 style="padding-top:10px;"><img src="images/photoshead.png"></h2>
                    </div>
                    <div class="bottomSection">
                        <h2 style="padding-top:10px;"><img src="images/everythingelse.png"></h2>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="bottomSection">
                    <div class="tweets">
                        <?php include('tweet.php'); ?>
                        <?php include('tweet.php'); ?>
                        <?php include('tweet.php'); ?>
                        <?php include('tweet.php'); ?>
                        <?php include('tweet.php'); ?>
                        <?php include('tweet.php'); ?>
                  


                        <div style="clear:both;"></div>
                    </div>
                </div>
<!--                <div class="bottomSection">-->
                <div class="photofeed">
                    <div class="photorow">
                        <?php include('hyperpublic.php')?>
                        
                        
                        
                         <div style="clear:both;"></div>
                    </div>
                   
                </div>
<!--                </div>-->
                <div class="bottomSection">
                <div class="everything">
                   <?php include('everythingelse.php'); ?>
                   <?php include('everythingelse.php'); ?>
                   <?php include('everythingelse.php'); ?>
                   <?php include('everythingelse.php'); ?>
                   <?php include('everythingelse.php'); ?>
                   <?php include('everythingelse.php'); ?>
     
                </div>

                 </div>


              </div>
        <div style="clear:both;"></div>
        <div class="loadmore">
          <center>
            <img style="padding-top:15px;"src="images/loadmore.png">
          </center>
        </div>
        <div class="footer">
            <center>
            <ul>
                <li><a href="#">Our Team</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            </center>
        </div>

    </body>
</html>