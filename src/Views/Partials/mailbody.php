<?php
$total = 0;
?>

<body style="background: linear-gradient(180deg, #d3cbb8 0, #736b53 75%);">
    <div
        style="max-width: 600px; width:100%; margin: 0 auto; display: block; line-height: 1.5; background-color: #f2f2f2; box-shadow: 0 1rem 1rem #736b53; font-family: sans-serif;">
        <div style="padding: 20px;">
            <h1 style="text-align: center;">Order Confirmation</h1>
            <p style="text-align: center;">Thank you for your order. We will be in touch soon.</p>
        </div>
        <table style="border-collapse: collapse; max-width: 600px; width:100%; color:black; background-color:white; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="border: 1px solid black; padding: 5px;">Item</th>
                    <th style="border: 1px solid black; padding: 5px;">Quantity</th>
                    <th style="border: 1px solid black; padding: 5px;">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) { ?>
                <tr>
                    <td style="border: 1px solid black; padding: 5px;">
                            <?php echo $item['0']; ?>
                    </td>
                    <td style="border: 1px solid black; padding: 5px;">
                            <?php echo $item['2']; ?>
                    </td>
                    <td style="border: 1px solid black; padding: 5px; text-align:right">
                        R
                            <?php echo $item['1']; ?>
                    </td>
                </tr>
                    <?php
                    $total += $item['1'] * $item['2'];
                } ?>
                <tr>
                    <td colspan="2" style="border: 1px solid black; padding: 5px; text-align: right;">Subtotal:</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: right;">
                        <b>R
                            <?php echo $total; ?>
                        </b>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; padding: 5px; text-align: right;">VAT:</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: right;">
                        <b>R
                            <?php echo $total * 0.15; ?>
                        </b>
                </tr>

                <tr>
                    <td colspan="2" style="border: 1px solid black; padding: 5px; text-align: right;">Total:</td>
                    <td style="border: 1px solid black; padding: 5px; text-align: right;">
                        <b>R
                            <?php echo $total * 1.15; ?>
                        </b>
                </tr>
            </tbody>
        </table>
        <div style="padding: 20px;">
            <p style="text-align: center;">
                If you have any questions, please contact us at
                </br><b><a href="mailto: nahkalive@gmail.com" style="text-decoration: none; color: black;">
                        nahkalive@gmail.com
                    </a></b>
            </p>
        </div>
    </div>

    <body>