
<?php include './view/header.php'; ?>
<main>
    <h1>Customer Search</h1>
    <p class="error"><?php echo $error ?></p>


<form action="." method = "post" id="search_form">
    <label>Telephone number:</label>
        <input type="tel" name="phone">
        <input type="submit" value="Search">
        <input type="hidden" name="action" value="customer_search"> 
</form>

</main>
<?php include './view/footer.php'; ?>