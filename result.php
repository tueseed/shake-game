
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
            <div class="row">
                <div class="col-lg-12 text-center">
                    <input type="button" class="btn btn-success" onclick="control()" value="เริ่มเกมส์">
                </div>
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
            function control()
            {
                var score = firebase.database().ref('control');
                score.on('value', function(snapshot) {
                                                    var status = snapshot.val();
                                                    if(status == 'off')
                                                    {
                                                        firebase.database().ref('control').set('on');
                                                    }
                                                    else if(status == 'on')
                                                    {
                                                        firebase.database().ref('control').set('off');
                                                    }
                                                }
                    );                          
            }
            

            

           

            

           
        </script>
    </body>
</html>

