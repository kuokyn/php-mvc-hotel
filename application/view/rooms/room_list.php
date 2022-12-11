<h2>Список доступных номеров</h2>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Кол-во комнат</th>
                <th>Кол-во человек</th>
                <th>Тип</th>
                <th>Цена за стуки</th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["chambers"] . "</td>
                       <td>" . $res["people"] . "</td>
                       <td>" . $res["room_type_title"] . "</td>
                       <td>" . $res["price"] . '$</td>
                    </tr>
                  </tbody>';
            }
            ?>
        </table>
    </section>
<?php } else { ?>
    <p>Sorry, no results.</p><br>
<?php } ?>
<?php include(ROOT . "/view/shared/footer.php") ?>