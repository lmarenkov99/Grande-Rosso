<?php

// ==================================================================
// # Проверка переменных
// ==================================================================

$name     = (isset($_POST['name'])     && $_POST['name']     != '')?htmlspecialchars($_POST['name'])  :'Имя не указано';
$phone    = (isset($_POST['phone'])    && $_POST['phone']    != '')?htmlspecialchars($_POST['phone']) :'';

if ( empty($phone ) ) die('false');

// ==================================================================
// # Настройка переменных
// ==================================================================

$to      = 'grande-rosso@yandex.ru';
$from    = 'robot2@granderosso.ru <robot2@granderosso.ru>';
$subject = 'Заявка с granderosso.ru';
$text    = 'Имя: '.$name.'<br>';
$text   .= 'Телефон: '.$phone.'<br>';

$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: $from\r\n";

// ==================================================================
// # Отправка письма
// ==================================================================

mail($to, $subject, $text, $headers);
echo 'true';
// ==================================================================
// # Отправка в CRM
// ==================================================================


$source_array = array(
    'organic'  => '39', // прямой визит
    'site'     => '39',
    'seo'      => '37',
    'adwords'  => '19',
    'direct'   => '20',
    'facebook' => '26',
    'vk'       => '27',
);
$source_id = '';
$pieces    = explode('_', $_COOKIE['roistat_marker']);
preg_match("/[a-zA-Z]+/", $pieces[0], $piece);
switch ($piece[0]) {
    case 'site':
        $source_id = $source_array['site'];
        break;
    case 'seo':
        $source_id = $source_array['seo'];
        break;
    case 'adwords':
    case 'google':
        $source_id = $source_array['adwords'];
        break;
    case 'direct':
    case 'yandex':
        $source_id = $source_array['direct'];
        break;

    case 'facebook':

        $source_id = $source_array['facebook'];
        break;

    case 'vk':
        $source_id = $source_array['vk'];
        break;

    default:
        $source_id = $source_array['organic'];
        break;

}

$msg2b24 = '';

require_once 'bx.php';
$bx24 = new Bx24('14', 'gik-kazan.bitrix24.ru', 'q25a3zhyhucc67as');

$queryData = array(
    'fields' => array(
        'TITLE'             => 'Заявка с сайта granderosso.ru',
        'NAME'              => $name,
        'PHONE'             => array(array("VALUE" => $phone, "VALUE_TYPE" => 'MOBILE')),
        'ASSIGNED_BY_ID'    => 112,
        'SOURCE_ID'         => $source_id,
        'UF_CRM_1539422327' => $_COOKIE['roistat_visit'],
    ),
    'params' => array("REGISTER_SONET_EVENT" => "Y"),
);
$resAdd = $bx24->request('crm.lead.add', $queryData);
