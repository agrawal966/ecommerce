<?php
    $this->load->view('templates/email/email_header');
?>
<td style="padding: 20px;">
    <p>Hi, <?php echo $user_name; ?>!<br><br>
    Your <?php echo $plan_name; ?> Subscription has been cancelled and will not renew on your next payment date.
    Please note that it may take some time to update the details in your Account.
    <br><br><br>
    Thanks,<br>
    <?php echo SITE_NAME; ?></p>
</td>
<?php
    $this->load->view('templates/email/email_footer');
?>