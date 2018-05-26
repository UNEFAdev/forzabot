<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  // return only the headers and not the content
  // only allow CORS if we're doing a GET - i.e. no saving for now.
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) &&
      $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: X-Requested-With');
  }
  exit;
}
require 'bootstrap.php';
header('Content-Type: application/json');
// Instanciar Libreria de Telegram
$bot = new AlexR1712\Telegram();

// Tomar JSON del body
$request = json_decode(file_get_contents('php://input'), true);
// Tipos de Mensajes que se pueden enviar
$message_types = [
    'POST', 'ALERT', 'PHOTO', 'AUDIO', 'DOCUMENT'
];

// Validar si es valido el tipo de mensaje que se envia
if (!isset($request['type'])) {
    http_response_code(401);
    die(json_encode(['ok'=>false, 'message' => 'Error: type no esta definido']));
} else if (!in_array($request['type'], $message_types)) {
    http_response_code(401);
    die(json_encode(['ok'=>false, 'message' => 'Error: Tipo de Mensaje no permitido o invalido']));
}
$responses = [];
switch ($request['type']) {
    case 'POST':
        // Telegram Message Conf
        $args = [
            'parse_mode' => 'markdown'
        ];
        // Set button if exists url of post
        if (isset($request['post_url'])) {
            $args[reply_markup] = [
                'inline_keyboard' => [
                    [[
                        'text' => (isset($request['button']['text'])) ? $request['button']['text'] : '👁 Ver Mas..',
                        'url' => (isset($request['button']['url'])) ? $request['button']['url'] : ''
                    ]]
                ]
            ];
        }
        // If request contains post url set in the message to broadcast
        $link = '';
        if (isset($request['post_url'])) {
            $link = "\n\n👁 [Ver mas..]({$request['post_url']})";
        }

        // Get channels id

        if (strtolower($request['category']) == 'todo') {
            $statement = $db->prepare('SELECT canal_id FROM canales');
            $statement->execute();
        } else {
            $statement = $db->prepare('SELECT canal_id FROM canales WHERE LOWER(categoria) = LOWER(:category)');
            $statement->execute([
                'category' => $request['category']
            ]);
        }
        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($rows as $channel) {
            $message = '🆕 ';
            $message .= "*{$request['title']}*\n{$request['message']}{$link}";
            $responses[] = $bot->sendMessage($channel['canal_id'], $message, $args);
        }
        break;
    case 'ALERT':
        break;
}

echo json_encode(['ok' => true, 'response' => $responses]);
