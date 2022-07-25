<?php
  // Helper functions
  function generateHyperlinkHTML($hyperlink, $displayText) {
    return ("<li><a href='#{$hyperlink}' class='button n01'>{$displayText}</a></li><br />");
  };


  function generateSection($header, $hyperlink, $content) {
    return ("<section id='{$hyperlink}-section'><p><h1>{$header}</h1></p><br/><p>{$content}</p><br/></section>");
  };


  function generateHyperlinkSectionPair($folderName) {
    $metaArray = file("methods/{$folderName}/meta.txt");
    $localHyperlink = generateHyperlinkHTML($folderName, $metaArray[0]);

    $localSection = generateSection($metaArray[2], $folderName, file_get_contents("methods/{$folderName}/content.txt"));
    
    return array($localHyperlink, $localSection);
  };

  // The juicy stuff

  $hyperlink = "";
  $section = "";

  foreach(array_diff(scandir("methods"), array('.', '..')) as $folderName) {
    $generatedPairs = generateHyperlinkSectionPair($folderName);
    $hyperlink .= $generatedPairs[0];
    $section .= $generatedPairs[1];
  };

?>
<html lang="en">
 <head> 
    <title>Beamz ~ Methods</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
	<meta name="description" content="aaa" />
	<meta property="og:title" content="Beamz ~ Beaming Methods" />
	<meta property="og:site_name" content="It's literally is free methods." />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="All methods are free for your skid ass to use!" />
	<meta property="og:image" content="static/images/preview.png" />
  <meta name="twitter:card" content="summary_large_image">
	<link rel="stylesheet" href="static/css/style.css">
  </head>
  <body>
    <div id="mainContent">
      <div id="wrapper">
		<div id="main">
      <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <header id="header">

          
          <div class="wrap-collabsible">
              <div class="content-inner">
                <ul id="buttons01" class="buttons">
                  <?php echo $hyperlink?>
                </ul>
              </div>
          </div>
				</header>
      </div>
			<div class="inner">
        <center>
          <h1 style="font-size: 90px;">Beamz</h1>
        </center>
				<header id="header" style="margin-top: 50px">
					<ul id="buttons01" class="buttons">
            <li><a href="#home" style="cursor: pointer;" class="button n01">Home</a></li>
						<li><a id="openSideBar" style="cursor: pointer;" class="button n01" onclick="openNav()">Methods</a></li>
					</ul>
				</header>
        <center>
          <hr style="border: 2px solid #b5b7bf; border-radius: 3px;"/>
        </center>
				<section id="home-section" style="margin-top: 10px;">
					<p>Beamz Official Method Site</p>
          <p>Come and <a class="links" href="discord.gg/beamz"> join the discord</a> it makes you so much cooler.</p>
<?php echo $method?>
          <div style="margin-bottom: 40px;"></div>
			<h1>Contributors</h1>
            <div class="row">
                <div class="col">
                    <figure>
                        <img src = "https://cdn.discordapp.com/avatars/784246526104043582/a_f6f1206013948f8234a593af0992f22d.gif?width=461&height=461" width=90px draggable="false"/>
                        <figcaption><p style="font-size: 14px">banov#8372 <br /> Developer</p></figcaption>
                    </figure>
                </div>
        <div class="col">
                  <figure>
                        <img src = "https://cdn.discordapp.com/avatars/889305971636203620/bc4686351a419101c451a371173c0f41.webp?width=461&height=461" width=90px draggable="false"/>
                        <figcaption><p style="font-size: 14px">6ggy#9458 <br /> Developer</p></figcaption>
                    </figure>
                </div>
                <div class="col">
                  <figure>
                        <img src = "https://cdn.discordapp.com/avatars/918196843341557800/1d0f2564c24720efcc1b255bccd4cbeb.webp?width=461&height=461" width=90px draggable="false"/>
                        <figcaption><p style="font-size: 14px">camel#0404 <br /> Developer</p></figcaption>
                    </figure>
                </div>
            </div>
            <br />
        </section>

        <?php echo $section ?>

			</div>
		</div>
	</div>
	<script src="script.js"></script>
  </div>
  </body>
</html>
