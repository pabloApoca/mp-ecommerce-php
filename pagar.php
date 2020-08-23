<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales

//MIO TEST-1532291260735947-082217-be7826544c5f2daebbe0c78a511c514b-390129455
MercadoPago\SDK::setAccessToken('TEST-8454724880295293-082303-46602d4a67385730495a40c59c7c089f-630199441');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

//curl -X POST \ -H "Content-Type: application/json" \ "https://api.mercadopago.com/users/test_user?access_token=TEST-1532291260735947-082217-be7826544c5f2daebbe0c78a511c514b-390129455" \ -d "{'site_id':'MLA'}"
//VENDEDOR
//{"id":630199441,"nickname":"TESTTWFKSHT8","password":"qatest1887","site_status":"active","email":"test_user_83615657@testuser.com"}
//COMPRADOR
//{"id":630202585,"nickname":"TETE2129949","password":"qatest2408","site_status":"active","email":"test_user_31630658@testuser.com"}

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Mi producto';
$item->quantity = 1;
$item->unit_price = 75.56;
$preference->items = array($item);
$preference->save();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="https://pablomlopez-mp-ecommerce-php.herokuapp.com/" method="POST">
        <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
        data-preference-id="<?php echo $preference->id; ?>">
        </script>
    </form>

    
</body>
</html>