<?php include("shared/header.php") ?>
<?php if ($result) { ?>
    <section>
        <h2>Update Or Delete Data</h2>
        <?php foreach ($result as $res) {

            $id = $res['ID'];
            $city = $res['city'];
            $countrycode = $res['countrycode'];
            $district = $res['district'];
            $population = $res['population'];

            ?>
            <form class="update" action="." method="POST">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id"
                       value="<?= $id ?>">
                <label for="city-<?= $id ?>">City Name:</label>
                <input type="text" id="city-<?= $id ?>" name="city"
                       value="<?= $city ?>" required>
                <label for="countrycode-<?= $id ?>">Country Code:</label>
                <input type="text" id="countrycode-<?= $id ?>" name="countrycode" maxlength="3"
                       value="<?= $countrycode ?>" required>
                <label for="district-<?= $id ?>">District:</label>
                <input type="text" id="district-<?= $id ?>" name="district"
                       value="<?= $district ?>">
                <label for="population-<?= $id ?>">Population:</label>
                <input type="text" id="population-<?= $id ?>" name="population"
                       value="<?= $population ?>">
                <button>Update</button>
            </form>
            <form class="delete" action="." method="POST">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id"
                       value="<?= $id ?>">
                <button class="red">Delete</button>
            </form>
        <?php } ?>
    </section>
<?php } else { ?>
    <p>Sorry, no results.</p><br>
<?php } ?>
<?php include("shared/status.php") ?>
    <a href=".">Back to Request Forms</a>
<?php include("shared/footer.php") ?>