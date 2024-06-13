<h1>Hello World</h1>
<p>En un lugar de la mancha de cuyo nombre...</p>

<?php foreach($products as $product) { ?>
<p><?= $product['name'] ?></p>
<?php } ?>

<form action="" method="POST">
    <button type="submit">
        GUARDAR
    </button>
</form>
