<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$page_title|default:'Serhat Dereli'}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>

    {block name=head}{/block}
</head>
<body class="is-preload">
    {block name=body}{/block}

    {literal}
    <script>
        window.onload = function() { document.body.classList.remove('is-preload'); }
        window.ontouchmove = function() { return false; }
        window.onorientationchange = function() { document.body.scrollTop = 0; }
    </script>
    {/literal}
    {block name=js}{/block}
</body>
</html>