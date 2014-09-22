<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SteamPicker</title>
        <link rel="stylesheet" type="text/css" href="steampicker.css">

        <link href='http://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gloria%20Hallelujah' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="std" id="head">
            <h1>SteamPicker<sup>beta</sup></h1>
            <div id="description">
                <p>You have too many Steam games.</p>
                <p>Let the machine choose one for you.</p>
            </div>
        </div>
        

<?php
$error=0;
$usercheck=0;
$steamid = $_GET["steamid"];
$completeurl= "http://steamcommunity.com/id/".$steamid."/games/?xml=1";
$use_errors = libxml_use_internal_errors(true);

if(simplexml_load_file($completeurl)===FALSE){$error=2;} else {$xml = simplexml_load_file($completeurl);}
libxml_clear_errors();
libxml_use_internal_errors($use_errors);

$i=0;


if ($error == 0)
{
	
	foreach($xml->error as $error)
	{
		$error = 1;
	}
	
	$userCheck = 1;
}
if ($error == 0 && $userCheck == 1)
{
	foreach($xml->games->game as $game)
	{
		if (
		stripos($game->name, "Authoring")=== FALSE && 
		stripos($game->name, "Tool")=== FALSE && 
		stripos($game->name, "map pack")=== FALSE && 
		stripos($game->name, "SDK")=== FALSE && 
		stripos($game->name,"beta")=== FALSE
		)
		//Dear Steam, please have a "this is not a game" flag.
		//Removed games with "beta" in the name by request.
		{
			$gamesarray[$i] = $game->name;
			$steamIDarray[$i] = $game->appID;
			$i++;
		}
	}
	
	$selectedgamenumber = rand(0,$i-1);
	$selectedgame = $gamesarray[$selectedgamenumber];
	$selectedid = $steamIDarray[$selectedgamenumber];
	
echo "

        <div id=\"result\">
            <p>You should play</p>
            <p id=\"game\">$selectedgame</p>
            <p>I'm sure it's a great game.</p>
            <p><a href=\"steam://rungameid/$selectedid\"><img src='play.png'></a></p><br>
            <p>Don't like it? <form method=\"post\"><input type=\"button\" value=\"Re-Roll\" onclick=\"window.location.reload()\"></form>
        </div>";
}

if($error==1)
{
	echo "<div id=\"result\">";
	echo "<p><b>What did you do? There's an error!</b></p>";
	echo "<p>Don't worry. Just press back and double check your username.<br>
			You may need to use your full Steam ID (a string of lots of numbers).<br>
			If you go to <A href=\"https://steamcommunity.com/\">http://steamcommunity.com/</A> and login, <br>your full ID will be in the address bar.</p></div>";
}

if($error==2)
{
	echo "<div id=\"result\">";
	echo "<p><b>Steam is up in smoke</b></p>";
	echo "<p>Looks like the Steam Community is down from here.<br>
	Please try again later. <br>
	Or now I guess, but that probably won't work.</p></div>";
}

?>
        <div id="signature"></div>

        <div id="foot" class="std">
            <p class="credit">Developed by <a href="https://twitter.com/theshillito">Peter Shillito</a></p>
            <p class="credit">Page design by <a href="https://twitter.com/mftb">Iain Dawson</a></p>
            <p class="credit">This site does not require your password or other personal information.<br>
            It simply reads your <b>public</b> Steam Community profile and picks a game at random.</p>
        </div>
    </body>
</html>
