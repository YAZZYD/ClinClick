<?php

namespace App\Notifications;

use App\Models\Cabinet;
use App\Models\Fournisseur;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Commande extends Notification
{
    use Queueable;
    protected $fournisseur;
    protected $cabinet;
    /**
     * Create a new notification instance.
     */
    public function __construct(Fournisseur $fournisseur,Cabinet $cabinet)
    {
       $this->fournisseur=$fournisseur;
       $this->cabinet=$cabinet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('ClinClick | Nouvelle commande reçue')
                    ->markdown('vendor.notifications.Commande',
                ['cabinet'=>$this->cabinet,
                'fournisseur'=>$this->fournisseur]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
