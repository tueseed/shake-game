
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Score Result</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="font.css" rel="stylesheet">
        <link href="result.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container-fluid bg4">
            <div class="row" style="margin-top:20px">
                <div class="col-lg-12 text-center">
                    <input type="button" class="btn btn-success" onclick="control()" id="btn_str" value="เริ่มเกมส์">
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-12 text-center">
                    <div class="progress" style="height:80px">
                        <div class="progress-bar bg-info progress-bar-striped" id="progressbar" style="width:0%;height:80px"></div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-lg-12 text-center">
                    <input type="button" class="btn btn-success" onclick="reset_score()" id="btn_rst" value="Reset">
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                
            </div>
        </div>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/alexgibson/shake.js/master/shake.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
        <script>  
            // Initialize Firebase
            var config = {
                apiKey: 'AIzaSyC16zgNqr4Tb9rZ86n_Z0Ht6C70Xwc_NGE',
                authDomain: 'shake-game-bfd34.firebaseapp.com',
                databaseURL: 'https://shake-game-bfd34.firebaseio.com',
                projectId: 'shake-game-bfd34',
            };
            firebase.initializeApp(config);

            var control_chk = firebase.database().ref('control');
            control_chk.on('value',function(snapshot){
                                                        if(snapshot.val() =='on')
                                                        {
                                                            document.getElementById('btn_str').setAttribute("value","หยุด");
                                                            console.log('on');
                                                        }
                                                        else if(snapshot.val() == 'off')
                                                        {
                                                            document.getElementById('btn_str').setAttribute("value","เริ่มเกมส์");
                                                            console.log('on');
                                                        }
                                                    }
                        );

            var score = firebase.database().ref('score');
            score.on('value', function(snapshot) {
                                                    var num = snapshot.val();
                                                    var percent = (num / 1000) * 100;
                                                    document.getElementById('progressbar').innerHTML = '<h1>'+ num +'</h1>' ;
                                                    document.getElementById('progressbar').setAttribute("style","width:" + percent + "%;height:80px");
                                                }
                    );

            function control()
            {
                var control = firebase.database().ref('control');
                control.once("value").then(
                                            function(snapshot) 
                                            {
                                                if(snapshot.val() =='on')
                                                {
                                                    firebase.database().ref('control').set('off');
                                                }
                                                else if (snapshot.val() == 'off')
                                                {
                                                    firebase.database().ref('control').set('on');    
                                                }
                                            }
                                         );                           
            }

            function reset_score()
            {
                firebase.database().ref('score').set(0);                          
            }
        </script>
    </body>
</html>

