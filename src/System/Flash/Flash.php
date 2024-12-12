<?php

namespace Plugins\Flash;


use Illuminate\Session\Store;

class Flash
{
    private const SESSION_FLASH_MESSAGE = 'session_flash_message';
    private const SESSION_FLASH_CLASS = 'session_flash_class';

    public function __construct(protected Store $session)
    {
    }

    public function get(): ?FlashMessage
    {
        $message = $this->session->get(self::SESSION_FLASH_MESSAGE);

        if (!$message) {
            return null;
        }

        return new FlashMessage(
            $message,
            $this->session->get(self::SESSION_FLASH_CLASS)
        );

    }

    public function info(string $message):void
    {
        $this->flash($message, 'info');
    }

    public function alert(string $message): void
    {
        $this->flash($message, 'alert');
    }

    private function flash(string $message, string $name): void
    {
        $this->session->flash(self::SESSION_FLASH_MESSAGE, $message);
        $this->session->flash(self::SESSION_FLASH_CLASS, config("flash.$name", ''));
    }



}
