<?php
    header('Content-Type: application/json');
    include 'conexao.php';

    $metodo = $_SERVER['REQUEST_METHOD'];
    // echo json_encode($metodo);

    $url = $_SERVER['REQUEST_URI'];
    $path = parse_url($url, PHP_URL_PATH);
    $path = trim($path,'/');

    $path_parts = explode('/',$path);

    $primeiraparte = isset($path_parts[0])? $path_parts[0] : '';
    $segundaparte = isset($path_parts[1])? $path_parts[1] : '';
    $terceiraparte = isset($path_parts[2])? $path_parts[2] : '';
    $quartaparte = isset($path_parts[3])? $path_parts[3] : '';

    $resposta = [
        'metodo' => $metodo,
        'primeiraparte' => $primeiraparte,
        'segundaparte' => $segundaparte,
        'terceiraparte' => $terceiraparte,
        'quartaparte' => $quartaparte,
    ];

    // echo json_encode($resposta);
    switch($metodo){
        case 'GET':
            if($terceiraparte == 'alunos' && $quartaparte == ''){
                echo json_encode([
                    'mensagem '=> 'Lista de todos os alunos'
                ]);
            }elseif($terceiraparte == 'alunos' && $quartaparte != ''){
                echo json_encode([
                    'mensagem '=> 'Lista de um aluno',
                    'id_aluno' => $quartaparte
                ]);
            }elseif($terceiraparte == 'cursos' && $quartaparte == '') {
                echo json_encode([
                    'mensagem '=> 'Lista de todos os cursos'
                ]);
            }elseif($terceiraparte == 'cursos' && $quartaparte != ''){
                echo json_encode([
                    'mensagem '=> 'Lista de um curso',
                    'id_curso' => $quartaparte
                ]);
            }
            break;
        case 'POST':
            break;
        case 'PUT':
            break;
        case 'DELETE':
            break;
        default:
            echo json_encode([
                'mensagem' => 'metodo não permitido'
            ]);
            break;
    }

?>