<?php
$created = filter_input(INPUT_GET, "created", FILTER_VALIDATE_INT);
$updated = filter_input(INPUT_GET, "updated", FILTER_VALIDATE_INT);
$deleted = filter_input(INPUT_GET, "deleted", FILTER_VALIDATE_INT);

if ($created) {
    echo "New city record successfully created";
}
if ($updated) {
    echo "New city record successfully updated";
}
if ($deleted) {
    echo "New city record successfully deleted";
}