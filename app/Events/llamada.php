<?php

namespace App\Events;
use App\Bitacora;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class llamada
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $bitacora;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bitacora $bitacora)
    {
        $this->bitacora = $bitacora;

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
