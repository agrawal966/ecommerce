<?php
    $this->load->view('templates/email/email_header');
?>

<td>
    <table width="100%" border="0" style="padding:0px 10px;">
        <tr>
            <td>
                <div class="content" style="font-size:15px;padding-left:15px;padding-right:15px;color:#0d0d0d;">
                    <p>Hello</p>
                    <p><?php echo $message; ?></p><br>
                    <p>Thank You! <br><?php echo $first_name." ".$last_name; ?></p>
                </div>
            </td>
        </tr>
    </table>
</td>

<?php
    $this->load->view('templates/email/email_footer');
?>