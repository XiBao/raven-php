Laravel
=======

Laravel supports Monolog out of the box, which also provides a native Sentry handler.

Laravel 5.x
-----------

To configure logging, pop open your ``bootstrap/app.php`` file, and insert the following:

.. sourcecode:: php

    $app->configureMonologUsing(function($monolog) {
<<<<<<< HEAD
        $client = new Raven_Client('___DSN___')
=======
        $client = new Raven_Client('___DSN___');
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012

        $handler = new Monolog\Handler\RavenHandler($client);
        $handler->setFormatter(new Monolog\Formatter\LineFormatter("%message% %context% %extra%\n"));

        $monolog->pushHandler($handler);
    });

Laravel 4.x
-----------

To configure logging, pop open your ``app/start/global.php`` file, and insert the following:

.. sourcecode:: php

<<<<<<< HEAD
    $client = new Raven_Client('___DSN___')
=======
    $client = new Raven_Client('___DSN___');
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012

    $handler = new Monolog\Handler\RavenHandler($client);
    $handler->setFormatter(new Monolog\Formatter\LineFormatter("%message% %context% %extra%\n"));

    $monolog = Log::getMonolog();
    $monolog->pushHandler($handler);

<<<<<<< HEAD
=======
Lumen 5.x
-----------

To configure logging, pop open your ``bootstrap/app.php`` file, and insert the following:

.. sourcecode:: php

    $app->configureMonologUsing(function($monolog) {
        $client = new Raven_Client('___DSN___');

        $handler = new Monolog\Handler\RavenHandler($client);
        $handler->setFormatter(new Monolog\Formatter\LineFormatter("%message% %context% %extra%\n"));

        $monolog->pushHandler($handler);

        return $monolog;
    });

>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
Adding Context
--------------

Context can be added via a Monolog processor:

.. sourcecode:: php

    $monolog->pushProcessor(function ($record) {
        $user = Auth::user();

        // Add the authenticated user
        if ($user) {
            $record['context']['user'] = array(
                'username' => Auth::user()->username,
                'ip_address' => Request::getClientIp(),
            );
        } else {
            $record['context']['user'] = array(
                'ip_address' => Request::getClientIp(),
            );
        }

        // Add various tags
        $record['context']['tags'] = array('key' => 'value');

        // Add various generic context
        $record['extra']['key'] = 'value';

        return $record;
    });
