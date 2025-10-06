<?php
// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if (!file_exists('db.php')) {
    http_response_code(500);
    die(json_encode([
        'error' => 'Error en el servidor',
        'details' => 'El archivo de configuración de la base de datos no existe'
    ]));
}

require_once 'db.php';

function verificarConexion() {
    try {
        $pdo = getDBConnection();
        
        return $pdo;
        
    } catch (PDOException $e) {
        error_log('Error de conexión a la base de datos: ' . $e->getMessage());
        return false;
    }
}

$pdo = verificarConexion();
if ($pdo === false) {
    http_response_code(500);
    die(json_encode([
        'error' => 'Error en el servidor',
        'details' => 'No se pudo conectar a la base de datos. Por favor, verifica la configuración.'
    ]));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);

$required = ['nombre', 'email', 'password', 'fecha_nacimiento'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode(['error' => "El campo $field es requerido"]);
        exit;
    }
}

try {
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
    $stmt->execute([$data['email']]);
    
    if ($stmt->rowCount() > 0) {
        http_response_code(400);
        echo json_encode(['error' => 'El correo electrónico ya está registrado']);
        exit;
    }
    
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("
        INSERT INTO usuarios (nombre, correo, password_hash, fecha_nacimiento)
        VALUES (?, ?, ?, ?)
    ");
    
    $result = $stmt->execute([
        $data['nombre'],
        $data['email'],
        $hashedPassword,
        $data['fecha_nacimiento']
    ]);
    
    if ($result) {
        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Usuario registrado exitosamente',
            'userId' => $pdo->lastInsertId()
        ]);
    } else {
        throw new Exception('No se pudo insertar el registro');
    }
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Error en el servidor',
        'details' => $e->getMessage()
    ]);
}
?>
