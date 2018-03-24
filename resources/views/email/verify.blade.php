<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Bestätige deinen Account bei beachfelder.de!</h2>

        <div>
            Danke, dass du einen Account bei beachfelder.de erstellst hast!
            Wir wünschen dir viel Spaß und erfolgreiches beachen :-)

            Gehe bitte auf folgenden Link um deine Registrierung abzuschliessen.
            {{ URL::to('register/verify/'.$foo) }}.<br/>

            Beach on!
            Dein beachfelder.de Team
        </div>

    </body>
</html>
