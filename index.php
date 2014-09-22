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
            <h1>SteamPicker<sup>Beta</sup></h1>
            <div id="description">
                <p>You have too many Steam games.</p>
                <p>Let the machine choose one for you.</p>
            </div>
        </div>
        
        <div id="form">
            <form name="input" action="playdatgame.php" method="get">
                <p><span id="space"><input id="steamid" type="text" style="text-align:center" name="steamid" value="Steam Username" onfocus="if(this.value=='Steam Username'){this.value='';}" onblur="if(this.value==''){this.value='Steam Username';}"></span></p>
            <input id="submit" type="submit" value="Pick a Game" >
            </form> 
        </div>

        <div id="signature"></div>

        <div id="foot" class="std">
            <p class="credit">Developed by <a href="https://twitter.com/theshillito">Peter Shillito</a></p>
            <p class="credit">Page design by <a href="https://twitter.com/mftb">Iain Dawson</a></p>
            <p class="credit">This site does not require your password or other personal information.<br>
            It simply reads your <b>public</b> Steam Community profile and picks a game at random.</p>
        </div>
    </body>
</html>
