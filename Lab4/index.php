

<?php

//Used Chatgpt to debug code for calculations...

$action = htmlspecialchars(filter_input(INPUT_GET, 'action'));
$size = htmlspecialchars(filter_input(INPUT_GET, 'size'));
$toppings = filter_input(INPUT_GET, 'toppings', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

$base_prices = ['small' => 5, 'medium' => 7, 'large' => 9];
$topping_prices = ['small' => 0.50, 'medium' => 1.00, 'large' => 1.50];

$base_price = 0;
$topping_cost = 0;
$total_cost = 0;


//calculations

if ($action == 'calculate') {
    if ($size && isset($base_prices[$size])) {
        $base_price = $base_prices[$size];
        $topping_price = $topping_prices[$size];
        
        if (!empty($toppings)) {
            $topping_cost = count($toppings) * $topping_price;
        }
        
        $total_cost = $base_price + $topping_cost;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order Form</title>
</head>
<body>
    <h1>Order Your Pizza</h1>
    
    <!-- Pizza Size Form -->
    <form action="index.php" method="get">
        <p>What size pizza would you like:</p>
        <input type="radio" id="small" name="size" value="small" required>
        <label for="small">Small ($5)</label><br>
        <input type="radio" id="medium" name="size" value="medium">
        <label for="medium">Medium ($7)</label><br>
        <input type="radio" id="large" name="size" value="large">
        <label for="large">Large ($9)</label><br>
        
        <p>Select your toppings:</p>
        <input type="checkbox" id="sauce" name="toppings[]" value="sauce">
        <label for="sauce">Sauce</label><br>
        <input type="checkbox" id="cheese" name="toppings[]" value="cheese">
        <label for="cheese">Cheese</label><br>
        <input type="checkbox" id="pepperoni" name="toppings[]" value="pepperoni">
        <label for="pepperoni">Pepperoni</label><br>
        <input type="checkbox" id="ham" name="toppings[]" value="ham">
        <label for="ham">Ham</label><br>
        <input type="checkbox" id="sausage" name="toppings[]" value="sausage">
        <label for="sausage">Sausage</label><br>
        <input type="checkbox" id="mushroom" name="toppings[]" value="mushroom">
        <label for="mushroom">Mushroom</label><br>
        <input type="checkbox" id="greenPeppers" name="toppings[]" value="greenPeppers">
        <label for="greenPeppers">Green Peppers</label><br>
        <input type="checkbox" id="onions" name="toppings[]" value="onions">
        <label for="onions">Onions</label><br>
        <input type="checkbox" id="anchovies" name="toppings[]" value="anchovies">
        <label for="anchovies">Anchovies</label><br>
        <input type="checkbox" id="hamburger" name="toppings[]" value="hamburger">
        <label for="hamburger">Hamburger</label><br>
        <input type="checkbox" id="spinach" name="toppings[]" value="spinach">
        <label for="spinach">Spinach</label><br>
        <input type="checkbox" id="chicken" name="toppings[]" value="chicken">
        <label for="chicken">Chicken</label><br>

        <input type="hidden" name="action" value="calculate">
        <input type="submit" value="Order Pizza">
    </form>

    <?php 
    
    if ($action == 'calculate'): ?>
    
        <h2>Your Order</h2>
       
        <p>Size: <?php echo ucfirst($size); ?> ($<?php echo number_format($base_price, 2); ?>)</p>
       
        <p>Toppings (<?php echo count($toppings); ?>):</p>
        
        <ul>
            <?php foreach ($toppings as $topping): ?>
                
                <li><?php echo ucfirst($topping); ?></li>
            
                    <?php endforeach; ?>
        </ul>
        
        <p>Topping Cost: $<?php echo number_format($topping_cost, 2); ?></p>
        
        <p>Total Cost: $<?php echo number_format($total_cost, 2); ?></p>
   
 <?php endif; ?>
        
        
</body>
</html>