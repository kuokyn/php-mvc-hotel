<h2>Создать бронирование</h2>
<form action="/book" method="POST">
    <input type="hidden" name="action" value="insert">
    <label for="check_in_date">Дата въезда</label>
    <input type="date" id="check_in_date" name="check_in_date" required>
    <label for="check_out_date">Дата выезда</label>
    <input type="date" id="check_out_date" name="check_out_date" required>
    <label for="people">Количество человек</label>
    <input type="text" id="people" name="people" required>
    <label for="room_id">ID номера</label>
    <input type="text" id="room_id" name="room_id" required>
    <label for="phone">Номер телефона</label>
    <input type="text" id="user_id" name="user_id" required><br>
    <button class="btn">Создать</button>
</form>