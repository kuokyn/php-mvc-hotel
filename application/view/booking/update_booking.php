<?php
echo '<section>
    <h2>Исправить бронирование</h2>
    <form action="/bookings" method="POST">
        <input type="hidden" name="action" value="update">
        <input type="hidden" id="id" name="id" value="'.$id.'">
        <label for="check_in_date">Дата въезда</label>
        <input type="date" id="check_in_date" name="check_in_date" value="'.$check_in_date.'" required>
        <label for="check_out_date">Дата выезда</label>
        <input type="date" id="check_out_date" name="check_out_date" value="'.$check_out_date.'" required>
        <label for="people">Количество человек</label>
        <input type="text" id="people" name="people" value="'.$people.'" required>
        <label for="room_id">ID номера</label>
        <input type="text" id="room_id" name="room_id" value="'.$room_id.'" required>
        <label for="user_id">ID пользователя</label>
        <input type="text" id="user_id" name="user_id" value="'.$user_id.'" required>
        <button>Submit</button>
    </form>
</section>';
