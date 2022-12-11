<h2>Добавить пользователя</h2>
<form action="/admin/users" method="POST">
    <input type="hidden" name="action" value="insert">
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" required>
    <label for="surname">Фамилия</label>
    <input type="text" id="surname" name="surname" required>
    <label for="phone">Номер телефона</label>
    <input type="text" id="phone" name="phone" required>
    <label for="email">Почта</label>
    <input type="text" id="email" name="email">
    <label for="password">Пароль</label>
    <input type="text" id="password" name="password"><br>
    <button class="btn">Добавить</button>
</form>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Почта</th>
                <th></th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["surname"] . "</td>
                       <td>" . $res["name"] . "</td>
                       <td>" . $res["phone"] . "</td>
                       <td>" . $res["email"] . '</td>
                       <td>
                       <form action="/admin/users" method="GET">
                       <input type="hidden" name="id" value="' . $res["phone"] . '">
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