<?php
    header('Content-Type: application/json');
    include 'conexao.php';

    $metodo = $_SERVER['REQUEST_METHOD'];
    // $input = json_decode(file_get_contents('php://input'), true);
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
                lista_alunos();
                
            }elseif($terceiraparte == 'alunos' && $quartaparte != ''){
                lista_um_aluno($quartaparte);
            }elseif($terceiraparte == 'cursos' && $quartaparte == '') {
                lista_cursos();
            }elseif($terceiraparte == 'cursos' && $quartaparte != ''){
                lista_um_curso($quartaparte);
            }
            break;
        case 'POST':
            if($terceiraparte == 'alunos'){
                echo json_encode([
                    'mensagem '=> 'INSERE UM ALUNO'
                ]);
            }elseif($terceiraparte == 'cursos'){
                insere_curso();
                // echo json_encode([
                //     'mensagem '=> 'INSERE UM NOVO CURSO'
                // ]);
            }
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
    
    function lista_alunos(){
        global $conexao;
        $resultado = $conexao->query("SELECT * FROM alunos");
        $alunos = $resultado->fetch_all(MYSQLI_ASSOC);
        echo json_encode([
            'mensagem '=> 'Lista de todos os alunos',
            'dados' => $alunos
        ]);
    }
    function lista_um_aluno($quartaparte){
        global $conexao;
        $stmt = $conexao->prepare("SELECT * FROM alunos WHERE id = ?");
        $stmt->bind_param('i',$quartaparte);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $aluno = $resultado->fetch_assoc();

        echo json_encode([
            'mensagem '=> 'Lista de um aluno',
            'dados_aluno' => $aluno
        ]);
    }
    function lista_cursos(){
        global $conexao;
        $resultado = $conexao->query("SELECT * FROM cursos");
        $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
        echo json_encode([
            'mensagem '=> 'Lista de todos os cursos',
            'dados' => $cursos
        ]);
    }
    function lista_um_curso($quartaparte){
        global $conexao;
        $stmt = $conexao->prepare("SELECT * FROM cursos WHERE id = ?");
        $stmt->bind_parem('i',$quartaparte);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $curso = $resultado->fetch_assoc();

        echo json_encode([
            'mensagem '=> 'Lista de um curso',
            'dados_cursos' => $curso
        ]);
    }

    function insere_curso(){
        global $conexao;
        $nome_curso = $_GET['nome_curso'];

        $sql = "INSERT INTO cursos (nome_curso) VALUES ('$nome_curso')";
        
        if($conexao->query($sql) == TRUE){
            echo json_encode([
                'mensagem' => ' CURSO CADASTRADO COM SUCESSO'
            ]);
        }
        else {
            echo json_encode([
                'mensagem' => 'ERRO NO CADASTRO DO CURSO'
            ]);
        }
    }

?>