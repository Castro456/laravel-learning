<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    private User $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     * Subject - title
     */
    public function envelope(): Envelope //checkout this reference class
    {
        return new Envelope(
            subject: 'Welcome to Twitter Clone', //can add from,to,cc.bcc etc.
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content //checkout this reference class
    {
        return new Content(
            view: 'email-template.WelcomeEmail',
            with: [
                'user' => $this->user //We need to show the user name in the email content, so we are sending user details attribute to the email template view page.
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        //Send a mail with attachment, in-case want to use multiple attachment just put comma(,) and added attachment

        // In the following code we take image from the local storage. public is the disk name.
        return [
            Attachment::fromStorageDisk('public', 'profile/zqHccp5oYZf47Wt6LQrZ2J9Jio0TsKdw90UweZIK.jpg')
        ];
    }
}
