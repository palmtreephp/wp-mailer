<?php

require __DIR__ . '/../vendor/autoload.php';

if (!\function_exists('wp_mail')):
    function wp_mail($to, $subject, $body, $headers, $attachments)
    {
        return true;
    }
endif;
