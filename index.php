<?php
	if(isset($_POST["zip"]))
		$azip = $_POST["zip"];
		
	include('location.php');
    include('setting.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>
            
        </title>
        <script type="text/javascript">

 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-6191114-4']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();

</script>
    </head>
    <body>

        <div class="header">
            <div class="headerContainer">
                <div class="logo"></div>
                    <div class="searchbar">
                    	<form action="<?php echo $site_url;?>" method="post">
                            <input type="text" class="text" name="zip" placeholder='Type in a zip code ...' ></input>
	                            <div class="searchbutton"> <input type="image" class="searchbutton" src="images/search.png" value="Submit" alt="Submit"/></div>
						</form>
                        <div class="locateicon">
                            <a href="index.php?local=1"><img src="images/local.png"></a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="subbar">
            <div class="socialbuttons">
                <a href="https://www.facebook.com/apps/application.php?id=213023292054001"><img src="images/fb.png"></a>
                <a href="http://www.twitter.com/ekplore"><img src="images/twitter.png"></a>

            </div>
            <div class="distance">
                <div class="distancetitle"></div>
                <div class="distancebar"></div>
                <div style="clear:both"></div>
            </div>
        </div>
        <div class="map">
            <?php include('mapscript.php');?>
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
                        <?php include('publictweet.php'); ?>
                        
                  


                        <div style="clear:both;"></div>
                    </div>
                </div>
<!--                <div class="bottomSection">-->
                <div class="photofeed">
                    <div class="photorow">
                        <?php 
                        include('instagram.php');
                        include('hyperpublic.php'); ?>
                        
                        
                         <div style="clear:both;"></div>
                    </div>
                   
                </div>
<!--                </div>-->
                <div class="bottomSection">
                <div class="everything">
                   
                   <?php include('foursquare.php') ?>
                   <?php include('meetup.php'); ?>
     
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
                <li><a href="team.php">Our Team</a></li>
                <li><a href="press.php">Press</a></li>
                <li><a href="mailto:team@ekplore.com">Contact Us</a></li>
            </ul>
            </center>
        </div>

    </body>
</html>