<?php

namespace Plugins\Logging\Telegram;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Monolog\LogRecord;
use Service\Telegram\TelegramBotApi;

class TelegramLoggerHandler extends AbstractProcessingHandler
{

    private $chatId;
    private $token;

    public function __construct($config)
    {


        $level = Logger::toMonologLevel($config['level']);
        parent::__construct($level);

        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];
    }


    function write(LogRecord $record): void
    {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $record['formatted']);
    }
}
