<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramTestingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {

        return TelegramMessage::create()
                            ->to($notifiable->telegramid)
                            ->content("*".$notifiable->notice."*\n".$notifiable->noticedes)
                            ->button('View Detail',$notifiable->noticelink);
        // $url = url('/invoice/' . $this->invoice->id);

        // return TelegramMessage::create()
        //     // Optional recipient user id.
        //     ->to($notifiable->telegram_user_id)
        //     // Markdown supported.
        //     ->content("Hello there!")
        //     ->line("Your invoice has been *PAID*")
        //     ->line("Thank you!")

        //     // (Optional) Blade template for the content.
        //     // ->view('notification', ['url' => $url])

        //     // (Optional) Inline Buttons
        //     ->button('View Invoice', $url)
        //     ->button('Download Invoice', $url)
        //     // (Optional) Inline Button with callback. You can handle callback in your bot instance
        //     ->buttonWithCallback('Confirm', 'confirm_invoice ' . $this->invoice->id);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
