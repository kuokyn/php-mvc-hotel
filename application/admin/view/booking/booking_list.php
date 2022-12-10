
    <h2>Добавить бронирование</h2>
    <form action="/admin/bookings" method="POST">
        <input type="hidden" name="action" value="create">
        <label for="check_in_date">Дата въезда</label>
        <input type="date" id="check_in_date" name="check_in_date" required>
        <label for="check_out_date">Дата выезда</label>
        <input type="date" id="check_out_date" name="check_out_date" required>
        <label for="people">Количество человек</label>
        <input type="text" id="people" name="people" required>
        <label for="room_id">ID номера</label>
        <input type="text" id="room_id" name="room_id" required>
        <label for="user_id">ID пользователя</label>
        <input type="text" id="user_id" name="user_id" required>
        <button>Submit</button>
    </form>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>room_id</th>
                <th>user_id</th>
                <th>check_in_date</th>
                <th>check_out_date</th>
                <th>people</th>
                <th>update</th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["room_id"] . "</td>
                       <td>" . $res["user_id"] . "</td>
                        <td>" . $res["check_in_date"] . "</td>
                         <td>" . $res["check_out_date"] . "</td>
                       <td>" . $res["people"] . '</td>
                       <td>
                       <form action="/admin/bookings" method="GET">
                       <input type="hidden" name="id" value="' . $res["id"] . '">
                       <button>update</button>
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
<?php include(ROOT . "/admin/view/shared/footer.php") ?>