<?php $render('partial/header', $data); ?>

<h1>Order summary</h1>
<p>Thank you for your purchase.</p>
<p>Your order number is <?php $htmlOut($data['orderId']); ?>.</p>

<?php $render('partial/footer', $data); ?>