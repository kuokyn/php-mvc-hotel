<?php
echo '<section>
    <h2>Бронирование № '.$booking["id"].'</h2>
    <form action="/admin/bookings" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" id="id" name="id" value="'.$booking["id"].'">
        <label for="check_in_date">Дата въезда</label>
        <input type="date" id="check_in_date" name="check_in_date" value="'.$booking["check_in_date"].'" required>
        <label for="check_out_date">Дата выезда</label>
        <input type="date" id="check_out_date" name="check_out_date" value="'.$booking["check_out_date"].'" required>
        <label for="people">Количество человек</label>
        <input type="text" id="people" name="people" value="'.$booking["people"].'" required>
        <label for="room_id">ID номера</label>
        <input type="text" id="room_id" name="room_id" value="'.$booking["room_id"].'" required>
        <label for="user_id">ID пользователя</label>
        <input type="text" id="user_id" name="user_id" value="'.$booking["user_id"].'" required><br>
        <button class="btn">Обновить</button>
    </form>
    <form action="/admin/bookings" method="POST">
    <input type="hidden" id="id" name="id" value="'.$booking["id"].'">
    <input type="hidden" name="action" value="delete">
        <button class="btn red">Удалить</button>
    </form>
    <a href="/admin/bookings">Назад</a>
</section>';
