<?php

namespace UA\UAplatformBundle\Room;

use Gos\Bundle\WebSocketBundle\Topic\TopicInterface;
use Gos\Bundle\WebSocketBundle\Client\ClientManipulatorInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Gos\Bundle\WebSocketBundle\Router\WampRequest;

class UARoom implements TopicInterface
{
    /**
     * @var ClientManipulatorInterface
     */
    protected $clientManipulator;

    /**
     * @param ClientManipulatorInterface $clientManipulator
     */
    public function __construct(ClientManipulatorInterface $clientManipulator)
    {
        $this->clientManipulator = $clientManipulator;
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
        //this will broadcast the message to ALL subscribers of this topic.
        $utilisateur = $this->clientManipulator->getClient($connection);
        $topic->broadcast(['data' => $utilisateur . " a rejoint le salon"]);
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
        //this will broadcast the message to ALL subscribers of this topic.
        $utilisateur = $this->clientManipulator->getClient($connection);
        $topic->broadcast(['data' => $utilisateur . " a quitté le salon "]);
    }

    /**
     * This will receive any Publish requests for this topic.
     *
     * @param ConnectionInterface $connection
     * @param Topic $topic
     * @param WampRequest $request
     * @param $data
     * @param array $exclude
     * @param array $eligibles
     * @return mixed|void
     */
    public function onPublish(ConnectionInterface $connection, Topic $topic, WampRequest $request, $data, array $exclude, array $eligibles)
    {
        /*
            $topic->getId() will contain the FULL requested uri, so you can proceed based on that

            if ($topic->getId() == "acme/channel/shout")
               //shout something to all subs.
        */


        $utilisateur = $this->clientManipulator->getClient($connection);
        $userId = [$connection->WAMP->sessionId];

        $topic->broadcast([
            'data' => trim($utilisateur) . ": " . trim($data)
        ], $userId);

        $topic->broadcast([
            'data' => "vous: " . trim($data)
        ], [], $userId);
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
