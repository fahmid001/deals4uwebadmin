<?php

echo 'Your  <b>' . $title . '</b>  deal has been rejected';

$rejectinfo = DB::table('reject_message_tbl')->where('id', '=', $reject_msg_id)->first();
if ($rejectinfo):
    echo '<p><b>Reject reason : </b></p>';
    echo '<p>' . $rejectinfo->title . '</p>';
    echo '<p>' . $rejectinfo->details . '</p>';
endif;
?>

