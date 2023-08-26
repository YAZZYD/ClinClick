<?php

namespace App\Notifications;


use App\Models\Fournisseur;
use App\Models\Maintenancier;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommandeMaint extends Notification
{
    use Queueable;
    protected $fournisseur;
    protected $maint;
    /**
     * Create a new notification instance.
     */
    public function __construct(Fournisseur $fournisseur,Maintenancier $maint)
    {
       $this->fournisseur=$fournisseur;
       $this->maint=$maint;
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
                    ->markdown('vendor.notifications.CommandeMaint',
                ['maint'=>$this->maint,
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
