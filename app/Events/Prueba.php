<?php

namespace App\Events;
use App\Directorio;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Prueba
{
    use Dispatchable, SerializesModels;

//InteractsWithSockets,
    public $directorio;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Directorio $directorio)
    {
        $this->directorio = $directorio;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
