<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

//Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

  exit(0);
}

function pr($var) {
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}

$data = [];

$items = [];
for($i = 0; $i < 5; $i++) {
  $items[] = [
    'id' => $i,
    'article' => '3'.$i.'3'.$i.'3',
    'name' => 'Canon PowerShot SX400 IS<br>с улучшенной матрицей<br>и объективом',
    'inStock' => true,
    'img' => 'https://avatars.mds.yandex.net/get-mpic/195452/img_id7740723200091384987/9hq',
    'inFavourite' => false,
    'params' => [
      ['name' => 'Физический размер', 'value' => '23.2 x 15.2 мм'],
      ['name' => 'Диафрагма', 'value' => 'CMOS'],
      ['name' => 'Формат записи', 'value' => 'RAW, JPEG, MP4 и другие'],
      ['name' => 'Фокусное расстояние', 'value' => '18-55 мм.'],
    ]
  ];
}

if(isset($_GET['products'])){
  $data = ['success' => true, 'products' => $items];
}

if(isset($_GET['productId'])){
  $data = [
    'success' => true,
    'result' =>[ 
      'inFavourite' => true,
      'inFavouriteMessage' => 'Товар в избранном',
      'id' => $_GET['productId'],
    ]
  ];
}

if(isset($_GET['removeFromFavourite'])){
  $data = [
    'success' => true
  ];
}

if(isset($_GET['getFilteredItems'])){
  $data = ['success' => true, 'products' => $_GET['filter'] ? array_slice($items, 0, 2) : $items];
}

echo json_encode($data);