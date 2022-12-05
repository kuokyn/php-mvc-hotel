<?php
/*
 * В роутах каждому значению строки запроса, соответствует путь к экшену
 * Путь к экшену состоит из двух частей:
 *      название контроллера (NewsController), без слова контроллер(Controller) -> (news),
 *      название экшена (actionList) без слова экшен(action) -> (list).
 * Именно так роутер будет узнавать, какой экшен вызвать.
 * */


// 'bookings' - строка запроса
// 'news/index' - имя контроллера и экшена для обработки этого запроса (путь обработчика)
return array
(
    'bookings/([0-9]+)' => 'bookings/view/$1',
    'bookings' => 'bookings/index', // actionIndex в controller_bookings
    'rooms' => 'rooms/index', // actionIndex в controller_rooms
    'users' => 'users/index', // actionIndex в controller_users
);
?>