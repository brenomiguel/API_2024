<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* From Uiverse.io by themrsami */ 
    .search-container {
    position: relative;
    width: 290px;
    }

    .search-bar {
    position: relative;
    display: flex;
    align-items: center;
    background-color: #1e1e1e;
    border-radius: 8px;
    padding: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
    }

    .search-input {
    width: 100%;
    border: none;
    background: none;
    color: #fff;
    font-size: 16px;
    padding: 10px;
    outline: none;
    }

    .search-input::placeholder {
    color: #aaa;
    }

    .search-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background-color: #333;
    border-radius: 50%;
    margin-left: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    .search-icon svg {
    fill: #fff;
    }

    .search-icon:hover {
    background-color: #555;
    }

    .search-bar:hover {
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    }

    .search-bar:focus-within {
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.4);
    }

    .glow {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 200%;
    border-radius: 100px;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
    transition: all 0.5s ease;
    transform: translate(-50%, -50%) scale(0);
    z-index: -1;
    }

    .search-bar:hover + .glow {
    transform: translate(-50%, -50%) scale(1);
    }

    .search-bar:focus-within + .glow {
    transform: translate(-50%, -50%) scale(1.2);
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
    }

</style>
<body>

    <div class="search-container" style="float: right;">
    <div class="search-bar">
        <input type="text" class="search-input" placeholder="Search..." />
        <div class="search-icon">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            height="24"
            viewBox="0 0 24 24"
            width="24"
        >
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path
            d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM9.5 14C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
            ></path>
        </svg>
        </div>
    </div>
    <div class="glow"></div>
    </div>

    
</body>
</html>