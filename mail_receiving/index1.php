<?php
/* connect to gmail */
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'kumaresan.vertex@gmail.com';
$password = 'Vertex!2345';

/* try to connect */
$inbox = imap_open($hostname,$username ,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {

    /* begin output var */
    $output = '';

    /* put the newest emails on top */
    rsort($emails);

    /* for every email... */
    foreach($emails as $email_number) {

        /* get information specific to this email */
        $overview = imap_fetch_overview($inbox,$email_number,0);


        $output.= 'Name:  '.$overview[0]->from.'</br>';
            $output.= 'Email:  '.$overview[0]->message_id.'</br>';



    }

    echo $output;
} 

/* close the connection */
imap_close($inbox);
?>
