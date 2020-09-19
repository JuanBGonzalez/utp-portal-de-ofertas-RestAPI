
<?php
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

$woocommerce = new Client(
    'http://3.210.38.58/',
    'ck_54c44de2aeeef51ed8070303308be28e293cabea',
    'cs_d6f9146d45370f72709a57d543e6bc8ff8c00b90',
    [
        'version' => 'wc/v3',
    ]
);


//print_r($woocommerce->get('orders'));
$results= $woocommerce->get('orders');

echo  '<pre><code>' . print_r( $results, true ) . '</code><pre>';

