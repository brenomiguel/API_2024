<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>Menu Responsivo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <ul class="menu">
        <li title="home"><a href="#" class="menu-button home">Menu</a></li>
        <li title="search"><a href="pesquisa.php" class="search">Search</a></li>
        <li title="pencil"><a href="#" class="pencil">Pencil</a></li>
        <li title="about"><a href="#" class="active about">About</a></li>
        <li title="archive"><a href="#" class="archive">Archive</a></li>
        <li title="contact"><a href="#" class="contact">Contact</a></li>
    </ul>

    <ul class="menu-bar">
        <li><a href="index.php" class="menu-button">Menu</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="perfil.php">Profile</a></li>
        <li><a href="#">Editorial</a></li>
        <li><a href="#">About</a></li>
    </ul>

    <script>
        $(document).ready(function() {
            $(".menu-button").click(function() {
                $(".menu-bar").toggleClass("open");
            });
        });
    </script>
</body>
</html>