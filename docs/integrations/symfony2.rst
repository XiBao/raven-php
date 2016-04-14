Symfony2
========

Symfony2 supports Monolog out of the box, which also provides a native Sentry handler.

<<<<<<< HEAD
Simply add a new handler for Sentry to your config (i.e. in ``config_prod.yaml``), and you're good to go:
=======
Simply add a new handler for Sentry to your config (i.e. in ``config_prod.yml``), and you're good to go:
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012

.. sourcecode:: yaml

    monolog:
      handlers:
        main:
            type:         fingers_crossed
            action_level: error
            handler:      grouped_main

        sentry:
            type:  raven
            dsn:   '___DSN___'
            level: error

        # Groups
        grouped_main:
            type:    group
            members: [sentry, streamed_main]

        # Streams
        streamed_main:
            type:  stream
            path:  %kernel.logs_dir%/%kernel.environment%.log
            level: error

Adding Context
--------------

Capturing context can be done via a monolog processor:

.. sourcecode:: php

<<<<<<< HEAD
    namespace Acme\Bundle\AcmeBundle\Monolog;

    use Symfony\Component\DependencyInjection\ContainerInterface;
    use Acme\Bundle\AcmeBundle\Entity\User;

    class SentryContextProcessor {

        protected $container;

        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
=======
    namespace AppBundle\Monolog;

    use AppBundle\Entity\User;
    use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

    class SentryContextProcessor
    {
        protected $tokenStorage;

        public function __construct(TokenStorageInterface $tokenStorage)
        {
            $this->tokenStorage = $tokenStorage;
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
        }

        public function processRecord($record)
        {
<<<<<<< HEAD
            $securityContext = $this->container->get('security.context');
            $user = $securityContext->getToken()->getUser();

            if($user instanceof User)
            {

                $record['context']['user'] = array(
                    'name' => $user->getName(),
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                );
=======
            $token = $this->tokenStorage->getToken();

            if ($token !== null){
                $user = $token->getUser();
                if ($user instanceof UserInterface) {
                    $record['context']['user'] = array(
                        'name' => $user->getName(),
                        'username' => $user->getUsername(),
                        'email' => $user->getEmail(),
                    );
                }
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
            }

            // Add various tags
            $record['context']['tags'] = array('key' => 'value');

            // Add various generic context
            $record['extra']['key'] = 'value';

            return $record;
        }
<<<<<<< HEAD

=======
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
    }

You'll then register the processor in your config:

.. sourcecode:: php

    services:
        monolog.processor.sentry_context:
<<<<<<< HEAD
            class: Applestump\Bundle\ShowsBundle\Monolog\SentryContextProcessor
            arguments:  ["@service_container"]
            tags:
                - { name: monolog.processor, method: processRecord, handler: sentry }
=======
            class: AppBundle\Monolog\SentryContextProcessor
            arguments:  ["@security.token_storage"]
            tags:
                - { name: monolog.processor, method: processRecord, handler: sentry }


If you're using Symfony < 2.6 then you need to use ``security.context`` instead of ``security.token_storage``.
>>>>>>> 90cbb75d3c0aefa1ed5adf207a35627a2cdcd012
