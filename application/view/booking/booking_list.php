<h2>Мои бронирования</h2>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Номер</th>
                <th>Дата въезда</th>
                <th>Дата выезда</th>
                <th>Кол-во человек</th>
                <th></th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["room_id"] . "</td>
                        <td>" . $res["check_in_date"] . "</td>
                         <td>" . $res["check_out_date"] . "</td>
                       <td>" . $res["people"] . '</td>
                       <td>
                       <form action="/admin/bookings" method="GET">
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
    <p>Нет результатов</p><br>
<?php } ?>
<?php include(ROOT . "/admin/view/shared/footer.php") ?>