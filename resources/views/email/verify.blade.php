<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald|PT+Sans" rel="stylesheet">

        <style>
            body {background: #eaeaea;}

            h1 {
                font-family: 'Oswald', sans-serif;
                font-size: 30px;
                color: #798796;
                text-transform: uppercase;
            }

            p {
                font-family: 'PT Sans', sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #798796;
            }

            a {
                color: #08b8b8;
            }

            .content {
                background: #ffffff;
                padding: 30px;
                margin: auto;
                width: 80%;
                max-width: 600px;
            }

            .content__header {
                padding-bottom: 20px;
            }

            .content__main {
                padding-top: 20px;
                border-top: 1px #e1e1e1 solid;
                text-align: center;
            }

            .content__footer {
                padding-top: 20px;
                border-top: 1px #e1e1e1 solid;
                text-align: center;
            }

            .content__footer p {
                font-size: 12px;
            }

            .button {
                background: #457b8c;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 20px;
                padding-right: 20px;
                color: #ffffff;
                text-decoration: none;
                border-radius: 4px;
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="content__header">
                <img src="http://static.beachfelder.de/logo-beachfelder.de-domain_blue.jpg" alt="beachfelder.de - Deine Beachvolleyballfeld-Suchmaschine" width="200" height="36">
            </div>
            <div class="content__main">
                <h1>Nur noch ein Klick...</h1>

                <p>...und deinem Account bei beachfelder.de steht nichts mehr im Weg.</p>

                <p>
                    Gehe bitte auf folgenden Link um deine Registrierung abzuschliessen.
                    <br><br>

                    <a href="{{ URL::to('register/verify/'.$foo) }}" target="_blank" class="button">E-Mail Adresse bestätigen</a>
                    <br><br>
                </p>
                <p>
                    Beach on!<br>
                    Dein beachfelder.de Team
                </p>    
            </div>
            <div class="content__footer">
                <p>
                World of Beachsport GbR, Allmendäckerstr. 5/1, 75233 Tiefenbronn<br>
                Inhaber: Andreas Engmann, Fabian Pecher, Lukas Birringer<br>
                Kontaktiere uns hier: <a href="https://beachfelder.de/page/kontakt" target="_blank">https://beachfelder.de/page/kontakt</a>
                </p>
            </div>
        </div>
    </body>
</html>
