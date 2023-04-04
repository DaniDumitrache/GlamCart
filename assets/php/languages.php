<?php
require_once 'session.php';
session_start();

class lang
{
    public function __construct()
    {
        $Default_languages = 'EN';

        $avaliable_languages = ['EN', 'RO'];

        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (isset($_GET['lang'])) {
            switch ($_GET['lang']) {
                case $_GET['lang'] == 'EN' or $_GET['lang'] == 'en':
                    $_SESSION['lang'] = 'EN';
                    $_SESSION['curency'] = 'EUR';
                    // header('location:' . $actual_link);
                    break;
                case $_GET['lang'] == 'RO' or $_GET['lang'] == 'ro':
                    $_SESSION['lang'] = 'RO';
                    $_SESSION['curency'] = 'RON';
                    break;
            }
        }

        if (isset($_SESSION['lang'])) {
            switch ($_SESSION['lang']) {
                case 'EN':
                    $words = [
                        'header' => [
                            'Sign In' => 'Sign In',
                            'settings' => 'settings',
                            'language' => 'language',
                            'HOME' => 'HOME',
                            'SHOP' => 'SHOP',
                            'Products' => 'Products',
                            'SALE' => 'FOR SALE',
                            'CONTACT US' => 'CONTACT US',
                        ],

                        'MainPage' => [
                            'SURPRISE GIFT for orders above' => 'SURPRISE GIFT for orders above',
                            'Buy' => 'Buy',
                            'Free Shipping' => 'Free Shipping',
                            'Free Returns' => 'Free Returns',
                            'Support 24/7' => 'Support 24/7',
                            'On all orders over $75.00' =>
                            'On all orders over $75.00',
                            'Returns are free within 9 days' =>
                            'Returns are free within 9 days',
                            'Contact us 24 hours a day' =>
                            'Contact us 24 hours a day',
                            '100% Payment Secure' => '100% Payment Secure',
                            'Your payment are safe with us.' =>
                            'Your payment are safe with us.',
                            'Our Products' => 'Our Products',
                            'New Products' => 'New Products',
                        ],

                        'cart' => [
                            'Your Shopping Cart' => 'Your Shopping Cart',
                            'Your Shopping Cart is empty' =>
                            'Your Shopping Cart is empty',
                            'Your Cart Items' => 'Your Cart Items',
                            'Image' => 'Image',
                            'Product' => 'Product',
                            'Quantity' => 'Quantity',
                            'Price' => 'Price',
                            'Remove' => 'Remove',
                            'Cart Totals' => 'Cart Totals',
                            'Subtotal' => 'Subtotal',
                            'Total' => 'Total',
                            'Proceed to Checkout' => 'Proceed to Checkout',
                            'Update Cart' => 'Update Cart',
                            'Continue Shopping' => 'Continue Shopping',
                            'Clear Cart' => 'Clear Cart',
                            'Go back to the store' => 'Go back to the store',
                            'To add products to the basket, please return to the store.' =>
                            'To add products to the basket, please return to the store.',
                        ],

                        'WishList' => [
                            'Your wishlist is currently empty!' => 'Your wishlist is currently empty!',
                            'To add products to the wishlist, please return to the store.' => 'To add products to the wishlist, please return to the store.',
                            'Go back to the store' => 'Go back to the store'
                        ],

                        'checkout' => [
                            'Cart' => 'Cart',
                            'Information' => 'Information',
                            'Shipping' => 'Shipping',
                            'Payment' => 'Payment',
                            'Contact information' => 'Contact information',
                            'Already have an account?' =>
                            'Already have an account?',
                            'Login' => 'Login',
                            'Phone number' => 'Phone number',
                            'Shipping address' => 'Shipping address',
                            'country/region' => 'country/region',
                            'Address' => 'Address',
                            'Apartment, suite, etc. (optional)' =>
                            'Apartment, suite, etc. (optional)',
                            'Postal code' => 'Postal code',
                            'city' => 'city',
                            'Save this information for next time' =>
                            'Save this information for next time',
                            'Return to cart' => 'Return to cart',
                            'Continue to shipping' => 'Continue to shipping',
                        ],

                        'footer' => [
                            'Information' => 'Information',
                            'About Us' => 'About Us',
                            'Payment' => 'Payment',
                            'Contact Us' => 'Contact Us',
                            'Stores' => 'Stores',
                            'Social Links' => 'Social Links',
                            'New Products' => 'New Products',
                            'Best Sales' => 'Best Sales',
                            'Login' => 'Login',
                            'My Account' => 'My Account',
                            'Newsletter' => 'Newsletter',
                            'Subcribe to the TheFace mailing list to receive update on new arrivals, special offers and other discount information.' =>
                            'Subcribe to the TheFace mailing list to receive update on new arrivals, special offers and other discount information.',
                            'Subscribe' => 'Subscribe',
                        ],
                    ];
                    break;
                case 'RO':
                    $words = [
                        'header' => [
                            'Sign In' => 'Conectare',
                            'settings' => 'setări',
                            'language' => 'limbă',
                            'HOME' => 'ACASĂ',
                            'SHOP' => 'MAGAZIN',
                            'Products' => 'Produse',
                            'SALE' => 'LA REDUCERE',
                            'BLOG' => 'BLOG',
                            'CONTACT US' => 'CONTACTAŢI-NE',
                        ],

                        'MainPage' => [
                            'SURPRISE GIFT for orders above' => 'CADOU SURPRIZA la comenzi de peste',
                            'Buy' => 'Cumpără',
                            'Free Shipping' => 'Transport gratuit',
                            'Free Returns' => 'Returnări gratuite',
                            'Support 24/7' => 'Asistență 24/7',
                            'On all orders over $75.00' =>
                            'La toate comenzile de peste 75,00 USD',
                            'Returns are free within 9 days' =>
                            'Returnările sunt gratuite în 9 zile',
                            'Contact us 24 hours a day' =>
                            'Contactați-ne 24 de ore pe zi',
                            '100% Payment Secure' => 'Plata 100% sigura',
                            'Your payment are safe with us.' =>
                            'Plata dvs. este în siguranță cu noi.',
                            'Our Products' => 'Produsele noastre',
                            'New Products' => 'Produse noi',
                        ],

                        'cart' => [
                            'Your Shopping Cart' => 'Coșul tău de cumpărături',
                            'Your Shopping Cart is empty' =>
                            'Coșul Tău De Cumpărături este gol',
                            'Your Cart Items' => 'Articolele din coșul dvs',
                            'Image' => 'Imagine',
                            'Product' => 'Produs',
                            'Quantity' => 'Cantitate',
                            'Price' => 'Preț',
                            'Remove' => 'Elimina',
                            'Cart Totals' => 'Totalurile coșului',
                            'Subtotal' => 'Subtotal',
                            'Total' => 'Total',
                            'Proceed to Checkout' =>
                            'Finalizează cumpărăturile',
                            'Update Cart' => 'Actualizați coșul',
                            'Continue Shopping' => 'Continua cumparaturile',
                            'Clear Cart' => 'Ștergeți coșul',
                            'Go back to the store' => 'Intoarce-te in magazin',
                            'To add products to the basket, please return to the store.' =>
                            'Pentru a adauga produse in cos te rugam sa te intorci in magazin.',
                        ],

                        'WishList' => [
                            'Your wishlist is currently empty!' => 'Lista ta de dorințe este momentan goală!',
                            'To add products to the wishlist, please return to the store.' => 'Pentru a adăuga produse în lista de dorințe, vă rugăm să reveniți la magazin.',
                            'Go back to the store' => 'Intoarce-te in magazin'
                        ],

                        'checkout' => [
                            'Cart' => 'Cart',
                            'Information' => 'informație',
                            'Shipping' => 'Transport',
                            'Payment' => 'Plată',
                            'Contact information' => 'Informatii de contact',
                            'Already have an account?' => 'ai deja un cont?',
                            'Login' => 'Autentificare',
                            'Phone number' => 'Număr de telefon',
                            'Shipping address' => 'Adresa de transport',
                            'country/region' => 'tara/regiune',
                            'Address' => 'adresa',
                            'Apartment, suite, etc. (optional)' =>
                            'Apartament, strada etc. (optional)',
                            'Postal code' => 'Cod postal',
                            'city' => 'oraș',
                            'Save this information for next time' =>
                            'Salvați aceste informații pentru data viitoare',
                            'Return to cart' => 'Întoarce-te la coș',
                            'Continue to shipping' =>
                            'Continuați cu expedierea',
                        ],

                        'footer' => [
                            'Information' => 'informație',
                            'About Us' => 'Despre noi',
                            'Payment' => 'Plată',
                            'Contact Us' => 'Contactaţi-ne',
                            'Stores' => 'Magazine',
                            'Social Links' => 'Linkuri sociale',
                            'New Products' => 'Produse noi',
                            'Best Sales' => 'Cele mai bune vânzări',
                            'Login' => 'Autentificare',
                            'My Account' => 'Contul meu',
                            'Newsletter' => 'Buletin informativ',
                            'Subcribe to the TheFace mailing list to receive update on new arrivals, special offers and other discount information.' =>
                            'Abonați-vă la lista de corespondență TheFace pentru a primi actualizări cu privire la noile sosiri, oferte speciale și alte informații despre reduceri.',
                            'Subscribe' => 'Abonati-va',
                        ],
                    ];
                    break;
                default:
                    break;
            }
        } else {
            $_SESSION['lang'] = 'EN';
            $_SESSION['curency'] = 'EUR';
            header('refresh:0;');
        }

        return $this->words = $words;
    }
}

$lang = new lang;
