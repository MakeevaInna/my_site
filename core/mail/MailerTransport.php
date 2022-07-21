<?php

namespace Core\mail;

use Innette\Logger\FileStaticLogger;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class MailerTransport
{
    public static function sendEmail($email_to, $subject, $text)
    {
        $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('vitaworldonline@gmail.com')
            ->to($email_to)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
//            ->text($text)
            ->html($text);
        try {
            $mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            FileStaticLogger::info($e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }
}
