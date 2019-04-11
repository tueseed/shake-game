
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shake Game..</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="font.css" rel="stylesheet">
        <link href="game.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
            <!-- <div class="forHidePage text-center" id="loader">
                <img src="images/ajax-loader.svg" width="20%" style="margin-top:300px" alt="">
            </div> -->
        <div class="container">
            <div class="row" style="margin-top:40px">
                <div class="col-xs-10 col-xs-offset-1 text-center blueBG"><h1>LET's SHAKE</h1></div>
            </div>
            <div class="row" style="margin-top:40px">
                <div class="col-xs-10 col-xs-offset-1 text-center blueBG" id="score"><h1>คะแนน</h1></div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-xs-6 col-xs-offset-3" id="coinImg">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 blueBG text-center" id="startGameDiv">
                    <!-- <br><button class="btn btn-lg btn-default" onclick="gameStart();return false;">START GAME</button><br><br> -->
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/alexgibson/shake.js/master/shake.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
        <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
        <script>  
        // Initialize Firebase
        var config = {
                apiKey: 'AIzaSyC16zgNqr4Tb9rZ86n_Z0Ht6C70Xwc_NGE',
                authDomain: 'shake-game-bfd34.firebaseapp.com',
                databaseURL: 'https://shake-game-bfd34.firebaseio.com',
                projectId: 'shake-game-bfd34',
            };
        firebase.initializeApp(config);
        startGame=0;          

            //listen to shake event
            scoreAdd=0;
            var shakeEvent = new Shake({threshold: 15});
            shakeEvent.start();
            window.addEventListener('shake', function()
                                                        {
                                                            scoreAdd=scoreAdd+Math.floor(Math.random() * 3) + 1; 
                                                            writeUserData(scoreAdd);
                                                        }, 
                                                        false
                                    );

            var score = firebase.database().ref('score/');
            score.on('value', function(snapshot) {
                                                    var num=snapshot.val();
                                                    $("score").html(num);
                                                }
                    );                                  
            function stopShake()
            {
                shakeEvent.stop();
            }
            //check if shake is supported or not.
            if(!("ondevicemotion" in window)){alert("Not Supported");}


            function writeUserData(scoreData) {
                firebase.database().ref().set({
                    score: scoreData
                });
            }
            function gameStart(){
                startGame=1;
                $("#startGameDiv").html("<h4>Your Score</h4><div id='scoreTxt'><h3>Start SHAKE NOW!!!!</h3></div>");
            }
        </script>
    </body>
</html>

