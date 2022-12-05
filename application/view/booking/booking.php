<?php if ( $booking) { ?>
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
        <th>delete</th>
    </tr>
    </thead>
    <?php
    echo '<tbody>
                    <tr>
                       <td>' .  $booking["id"] . "</td>
                       <td>" .  $booking["room_id"] . "</td>
                       <td>" .  $booking["user_id"] . "</td>
                        <td>" .  $booking["check_in_date"] . "</td>
                         <td>" .  $booking["check_out_date"] . "</td>
                       <td>" .  $booking["people"] . '</td>
                      
                    </tr>
                  </tbody>';
            ?>
    </table>
    </section>
<?php } else { ?>
    <p>Sorry, no results.</p><br>
<?php } ?>
<?php include(ROOT . "/view/shared/footer.php") ?>