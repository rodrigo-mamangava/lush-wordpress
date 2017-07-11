<?php

// holds checks for all products in cart to see if they're in our category
$category_checks = array();
$suite_checks = array();
$pacote_checks = array();

// check each cart item for our category

$tem_pacote = false;
$tem_suite = false;

foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {

    $product = $cart_item['data'];
    $product_in_cat = false;




    // replace 'membership' with your category's slug
    if (has_term('suite', 'product_cat', $product->id)) {
        $suite_checks = true;
        $tem_suite = true;
    }

    if (has_term('pacote', 'product_cat', $product->id)) {
        $product_in_cat = true;
        $tem_pacote = true;
    }

    array_push($category_checks, $product_in_cat);
}
?>

<?php if (!$tem_pacote && $tem_suite) : ?>

    <tr>
        <td></td>

        <td colspan="5">
            <div class="alert alert-warning" role="alert">
                <span class="glyphicon glyphicon glyphicon-alert" aria-hidden="true"></span>
                <span class="sr-only"></span>
                <?php _traduz('As reservas tem o acréscimo da taxa de conveniência de R$ 220, devido ao custo operacional de deixar a suíte bloqueada durante todo o dia até a hora da sua hospedagem.', 'Reservations have an added convenience fee of R$ 220, due to the operating cost of leaving the suite locked throughout the day until the time of your stay.')?><br/>
                <?php _traduz('Adicionando na sua reserva um ou mais dos pacotes acima (com valor igual ou superior a taxa) você receberá R$ 220 de desconto no total dessa reserva.', 'Adding one or more of the above packages (with a value equal to or higher than the rate) to your reservation, you will receive a R$ 220 discount on the total of that reservation.')?>
            </div>
        </td>

    </tr>

<?php endif; ?>

<?php if ($tem_pacote && $tem_suite) : ?>

    <tr>
        <td></td>

        <td colspan="5">
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
                <span class="sr-only"><?php _traduz('Desconto', 'Discount')?>:</span>
                <?php _traduz('Como foi adicionado um pacote na sua reserva, você ganhou R$ 220 de desconto, confira abaixo', 'As a package has been added to your booking, you have earned R$ 220 off, check below')?>
            </div>
        </td>
    </tr>

<?php endif; ?>

    

