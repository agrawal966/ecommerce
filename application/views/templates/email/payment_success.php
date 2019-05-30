<?php
    $this->load->view('templates/email/email_header');
?>
<td>
    <table style="font-size: 15px; padding-left: 15px; padding-right: 15px; color: #373d3f; text-align: center; font-family: arial,sans-serif; box-sizing: border-box;" width="100%">
        <tbody>
            <tr>
                <td style="color: #337ab7; font-size: 20px; font-weight: bold; padding: 0px 0 15px; text-align: center;" colspan="2"><!-- Payment done successfully --><img src="https://drive.google.com/uc?id=1W-7mxb8VY5oAN9XOmJ-Knq9eH0lf1f3q" style="width: 65px;"></td>
            </tr>
            <tr style="font-size: 24px;">
                <td style="padding: 0px 0 15px; text-align: right;width: 50%;" align="center"><strong style="font-family: arial,sans-serif;">Plan Name : </td>
                <td style="padding: 0px 0 15px; text-align: left;font-weight: bold;" align="center"><?php echo ucfirst( $plan_name ); ?></td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: right;" align="center"><strong style="font-family: arial,sans-serif;font-weight: inherit;">TXN ID : </strong></td>
                <td style="padding: 0px 0 15px; text-align: left;" align="center"><?php echo $txn_id; ?></td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: right;" align="center"><strong style="font-family: arial,sans-serif;font-weight: inherit;">Amount Paid : </strong></td>
                <td style="padding: 0px 0 15px; text-align: left;" align="center"><?php echo $amt; ?></td>
            </tr>
            <tr>
                <td style="padding: 0px 0 15px; text-align: right;" align="center"><strong style="font-family: arial,sans-serif;font-weight: inherit;">Payment Status : </strong></td>
                <td style="padding: 0px 0 15px; text-align: left;" align="center"><?php echo $status; ?></td>
            </tr>
        </tbody>
    </table>
</td>
<?php
    $this->load->view('templates/email/email_footer');
?>