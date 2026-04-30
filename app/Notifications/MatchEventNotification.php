<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MatchEventNotification extends Notification
{
    use Queueable;

    protected $match;
    protected $event;
    protected $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($match, $event = null, $type = 'goal')
    {
        $this->match = $match;
        $this->event = $event;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if ($this->type === 'start') {
            return [
                'title' => 'Match Started!',
                'message' => "{$this->match->homeTeam->name} vs {$this->match->awayTeam->name} is now LIVE.",
                'match_id' => $this->match->id,
                'type' => 'start'
            ];
        }

        return [
            'title' => 'GOAL!',
            'message' => "GOAL for {$this->event->team->name}! {$this->event->player_name} ({$this->event->minute}')",
            'match_id' => $this->match->id,
            'type' => 'goal'
        ];
    }
}
