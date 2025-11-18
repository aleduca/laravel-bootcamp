<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordNotification extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   */
  public function __construct(private string $url)
  {
    //
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
    // return (new MailMessage)
    //   ->subject('Alterar sua senha)
    //   ->from('email@meuemail.com.br', 'Alexandre Cardoso')
    //   ->greeting('Olá, ' . $notifiable->email)
    //   ->line('Você está tentando alterar sua senha')
    //   ->line('Se não foi você que gerou esse link, desconsidere esse email e tome cuidado pois alguém está tentando roubar sua senha')
    //   ->action('Reset Password', $this->url)
    //   ->line('Obrigado')
    //   ->salutation('Volte sempre');

    return (new MailMessage)
      ->subject('Alterar sua senha')
      ->from('email@meuemail.com.br', 'Alexandre cardoso')
      ->view('email.reset-password', [
        'url' => $this->url, // Use the inherited resetUrl method
        'user' => $notifiable,
      ]);
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
