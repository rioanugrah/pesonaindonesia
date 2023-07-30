<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::routes();

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
// Broadcast::channel('notif-wisata', function () {
//     return true;
// });
// Broadcast::channel('notif-travelling', function () {
//     return true;
// });
Broadcast::channel('order-notif', function () {
    return true;
});
// Broadcast::channel('global-notif', function () {
//     return true;
// });