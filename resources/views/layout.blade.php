<!-- layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>F3 CRM</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
<div class="container">
    @yield('content')
</div>
{{--<script src="{{ asset('js/app.js') }}" type="text/js"></script>--}}
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
</script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
        crossorigin="anonymous">
</script>
<script src="/js/datepicker-ru.js">

</script>
<script>
    $(document).ready(function () {
        $.datepicker.setDefaults($.datepicker.regional["ru"]);
        $("#datepicker").datepicker($.datepicker.regional["ru"]);
    });
</script>
</body>
</html>