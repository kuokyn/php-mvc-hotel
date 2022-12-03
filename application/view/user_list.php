<?php include("header.php") ?>
<?php if ($result) { ?>
    <section>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>surname</th>
                <th>name</th>
                <th>phone</th>
                <th>email</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            </thead>
            <?php foreach ($result as $res) {
                echo '<tbody>
                    <tr>
                       <td>' . $res["surname"] . "</td>
                       <td>" . $res["name"] . "</td>
                       <td>" . $res["phone"] . "</td>
                       <td>" . $res["email"] . '</td>
                       
                       <td>
                           <form class="delete" action="router.php" method="GET">
                           <input type="hidden" name="controller" value="users">
                           <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="phone"
                                   value="' . $res["phone"] . '">
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