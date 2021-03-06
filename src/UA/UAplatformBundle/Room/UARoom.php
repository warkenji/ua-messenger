<?php

namespace UA\UAplatformBundle\Room;

use Doctrine\ORM\EntityManager;
use Gos\Bundle\WebSocketBundle\Topic\TopicInterface;
use Gos\Bundle\WebSocketBundle\Client\ClientManipulatorInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Gos\Bundle\WebSocketBundle\Router\WampRequest;
use UA\UserBundle\Entity\Utilisateur;

class UARoom implements TopicInterface
{
    /**
     * @var ClientManipulatorInterface
     */
    protected $clientManipulator;
    protected $entityManager;

    /**
     * @param ClientManipulatorInterface $clientManipulator
     * @param EntityManager $entityManager
     */
    public function __construct(ClientManipulatorInterface $clientManipulator, EntityManager $entityManager)
    {
        $this->clientManipulator = $clientManipulator;
        $this->entityManager = $entityManager;
    }

    private function getUtilisateur(ConnectionInterface $connection)
    {
        $client = $this->clientManipulator->getClient($connection);

        if($client instanceof Utilisateur) {
            $repository = $this->entityManager->getRepository('UserBundle:Utilisateur');
            return $repository->find($client->getId());
        }

        return null;
    }

    /**
     * This will receive any Subscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {
        $utilisateur = $this->getUtilisateur($connection);

        if($utilisateur) {
            $username = $utilisateur->getUsername();
        }
        else
        {
            $username = "Visiteur_" . $connection->resourceId;
        }


        $topic->broadcast([
            'you' => false,
            'username' => null,
            'data' => $username . " a rejoint le salon"
        ]);
    }

    /**
     * This will receive any UnSubscription requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @return void
     */
    public function onUnSubscribe(ConnectionInterface $connection, Topic $topic, WampRequest $request)
    {
        $utilisateur = $this->getUtilisateur($connection);

        if($utilisateur) {
            $username = $utilisateur->getUsername();
        }
        else
        {
            $username = "Visiteur_" . $connection->resourceId;
        }


        $topic->broadcast([
            'you' => false,
            'username' => null,
            'data' => $username . " a quitté le salon"
        ]);
    }

    /**
     * This will receive any Publish requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @param $rawData
     * @param array $exclude
     * @param array $eligibles
     * @return mixed|void
     */
    public function onPublish(ConnectionInterface $connection, Topic $topic, WampRequest $request, $rawData, array $exclude, array $eligibles)
    {
        $utilisateur = $this->getUtilisateur($connection);
        $data = trim($rawData);

        if($utilisateur)
        {
            $username = $utilisateur->getUsername();
        }
        else
        {
            $username = "Visiteur_" . $connection->resourceId;
        }

        if(!empty($rawData)) {
            $id = [$connection->WAMP->sessionId];
            $obj = [
                'you' => false,
                'username' =>$username,
                'data' => $data
            ];

            $topic->broadcast($obj, $id);

            $obj['you'] = true;

            $topic->broadcast($obj, [], $id);
        }
    }

    /**
     * Like RPC is will use to prefix the channel
     * @return string
     */
    public function getName()
    {
        return 'ua.room';
    }
}
