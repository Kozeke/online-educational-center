<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка...</title>
    <link rel="stylesheet" href="{{ asset("/css/main.css?".random_int(1000, 9999)) }}">
    <link rel="stylesheet" href="{{ asset("/css/app.css") }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="client-secret" content="H8l1whqSXFkAqTlsXsfZYqA3SSCiMZomBvOFBoFQ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

</head>
<body>
<div id="app">
    <div v-bind:class="{ 'bg-faded': !user }">

        <sidebar ref="sidebar" v-if="user"></sidebar>
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>

    </div>
</div>



<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{ asset("/js/app.js?v.1.7") }}" charset="utf-8"></script>


</body>
</html>