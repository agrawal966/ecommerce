<?php
    $this->load->view('templates/email/email_header');
?>

<td>
    <table style="font-family: arial,sans-serif; padding: 40px 0px;" border="0" width="100%">
        <tbody>
            <tr>
                <td>
                    <table style="font-size: 15px; padding-left: 15px; padding-right: 15px; color: #373d3f; text-align: center; font-family: arial,sans-serif; box-sizing: border-box;" width="100%">
                        <tbody>
                            <tr>
                                <td style="color: #337ab7; font-size: 20px; font-weight: bold; padding: 0px 0 15px; text-align: center;">Forgot Password</td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 0 15px; text-align: center;" align="center">Hello, <?php echo $name; ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 0 15px; text-align: center;" align="center">It looks like you requested a new password</td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 0 15px; text-align: center;" align="center">If that sounds right, you can enter the new password by clicking on the below link.</td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 0 15px; text-align: center;" align="center"><strong style="font-family: arial,sans-serif;">Link :</strong> <?php echo $link; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</td>

<?php
    $this->load->view('templates/email/email_footer');
?>