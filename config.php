<?php
require('stripe-php-master/init.php');

$publishableKey=
"pk_test_51K5BtMHu7UQqqilEpjcNXUJ8dQ7Ji6FMinEdS11MoERArC1ePEVzjVtuNcdPbEZcQLhP97WY9UJiz1ldoJKjwPAg00TXdU4U13";

$secretKey=
"sk_test_51K5BtMHu7UQqqilEFbLXSVrBq7FPpRTEGbAH7jBXObp2b2pT3KlGJJak9dmhnrhOfkFsStH8946cyQeWnPC5B8Xj00t7SSpZqm";

\Stripe\Stripe::setApiKey($secretKey);
?>