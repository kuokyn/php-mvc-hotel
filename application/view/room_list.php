<?php include("header.php") ?>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>chambers</th>
                <th>people</th>
                <th>room_type_title</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["id"] . "</td>
                       <td>" . $res["chambers"] . "</td>
                       <td>" . $res["people"] . "</td>
                       <td>" . $res["room_type_title"] . '</td>
                       
                       <td>
                           <form class="delete" action="router.php" method="GET">
                           <input type="hidden" name="controller" value="users">
                           <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="phone"
                                   value="' . $res["id"] . '">
                           <button class="red">delete</button></form>
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
<?php include("footer.php") ?>