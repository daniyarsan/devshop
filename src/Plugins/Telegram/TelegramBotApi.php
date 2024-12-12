<?php

namespace Service\Telegram;

use App\Exceptions\TelegramErrorException;
use Illuminate\Support\Facades\Http;

class TelegramBotApi
{

    public const HOST = 'https://api.telegram.org/bot';

    public static function sendMessage(string $token, string $chatId, string $message): void
    {
        try {
            Http::get(self::HOST . $token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message
            ]);
        } catch (\Exception $e) {
            throw new TelegramErrorException('Error in telegram log');
        }

    }
}
