<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TravellingEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public $url;
    public $title;
    public $description;
    public $color;
    public $icon;
    public $publish;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    // public function __construct($id,$url,$title,$description,$color,$icon,$publish)
    public function __construct($id,$url,$title,$description,$color,$icon,$publish)
    {
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->color = $color;
        $this->icon = $icon;
        $this->publish = $publish;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        // return new PrivateChannel('notif-travelling',);
        return ['notif-travelling'];
    }
}
