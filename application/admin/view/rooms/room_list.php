<h2>Список номеров</h2>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Кол-во комнат</th>
                <th>Кол-во человек</th>
                <th>Цена за сутки</th>
                <th>Тип</th>

            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["chambers"] . "</td>
                       <td>" . $res["people"] . "</td>
                       <td>" . $res["price"] . "$</td>
                       <td>" . $res["room_type_title"] . '</td>
                       
                       <td style="padding-left: 50px">
                       <form action="/admin/rooms" method="GET">
                       <input type="hidden" name="id" value="' . $res["id"] . '">
                       <button class="btn">Изменить</button>
                       </form>
                       </td>
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