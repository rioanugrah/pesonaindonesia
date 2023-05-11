<?php

namespace App\Http\Controllers\Camping;

use App\Http\Controllers\Controller;
use App\Notifications\TelegramTestingNotification;
use NotificationChannels\Telegram\TelegramUpdates;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramPoll;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Notice;

class TestingController extends Controller
{
    public function index()
    {
        $notice = new Notice([
            'id' => Str::uuid(),
            'notice' => 'Data Telegram Testing',
            'noticedes' => 'Cek Email',
            'noticelink' => 'https://plesiranindonesia.com',
            'telegramid' => Config::get('services.telegram_id')
        ]);

        // $notice->save();

        // return $notice;

        $notice->notify(new TelegramTestingNotification());
        return response()->json(['message','Success'],200);
        // return TelegramMessage::create()
        //     // Optional recipient user id.
        //     ->to(5702643590)
        //     // Markdown supported.
        //     ->content("Hello there!")
        //     ->line("Your invoice has been *PAID*")
        //     ->line("Thank you!")

        //     // (Optional) Blade template for the content.
        //     // ->view('notification', ['url' => $url])

        //     // (Optional) Inline Buttons
        //     ->button('View Invoice', 'https://plesiranindonesia.com')
        //     ->button('Download Invoice', 'https://plesiranindonesia.com')
        //     // (Optional) Inline Button with callback. You can handle callback in your bot instance
        //     ->buttonWithCallback('Confirm', 'confirm_invoice ' . 12345);

        // return TelegramPoll::create()
        //                 ->to("@rio_anugrah88")
        //                 ->question("Aren't Laravel Notification Channels awesome?")
        //                 ->choices(['Yes', 'YEs', 'YES']);
    }
}
