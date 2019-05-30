<?php
    $this->load->view('templates/email/email_header');
?>

<td>
    <table style="font-size: 15px; padding-left: 15px; padding-right: 15px; color: #373d3f; text-align: center; font-family: arial,sans-serif; box-sizing: border-box;" width="100%">
        <tbody>
            <tr>
                <td style="color: #337ab7; font-size: 20px; font-weight: bold; padding: 0px 0 15px; text-align: center;">Thank you for your registration</td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: center;" align="center"><strong style="font-family: arial,sans-serif;">Full Name:</strong> <?php echo $name; ?></td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: center;" align="center"><strong style="font-family: arial,sans-serif;">Email Address:</strong> <?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: center;" align="center"><strong style="font-family: arial,sans-serif;"><a href="<?php echo base_url("login"); ?>">Login Link</a></strong></td>
            </tr>
            <tr>
                <td style="color: #373d3f; padding-bottom: 10px;">The registration details contain in this email is provided by <?php echo SITE_NAME; ?>.</td>
            </tr>
        </tbody>
    </table>
</td>

<?php
    $this->load->view('templates/email/email_footer');
?>