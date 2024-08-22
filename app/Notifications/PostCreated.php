<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $post;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
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
                ->subject('New Post Created: ' . $this->post->title)
                ->greeting('Hello Admin!')
                ->line('A new post has been created and is pending approval.')
                ->line('Title: ' . $this->post->title)
                ->action('Review Post', url('/posts/pending/' . $this->post->id . '/admin'))
                ->line('If you approve this post, you can publish it.')
                ->action('Publish Post', url('/posts/' . $this->post->id . '/publish'))
                ->line('Thank you for your prompt action!');
        }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_id' => $this->post->id,
            'post_title' => $this->post->title,
        ];
    }
}
