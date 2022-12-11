<h2>Учёт дополнительных услуг</h2>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID бронирования</th>
                <th>Услуга</th>
                <th>Количество</th>
                <th>Сумма</th>
                <th>Оплачено</th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["booking_id"] . "</td>
                       <td>" . $res["service_title"] . "</td>
                       <td>" . $res["amount_of_services"] . "</td>
                        <td>" . $res["total_price"] . "</td>
                       <td>Да" . '</td>
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