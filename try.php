<?php

$token = '257229406:AAFgVKNlJ8hc8l7JWl9mDhzqfFBP6VLe6EU';


//----------------------------------------------------------------------------------
$string = json_decode(file_get_contents('php://input'));
function objectToArray( $object ){
if( !is_object( $object ) && !is_array( $object ) ){
return $object;
}
if( is_object( $object ) ){
$object = get_object_vars( $object );
}
return array_map( 'objectToArray', $object );
}
$result = objectToArray($string);
$user_id = $result['message']['from']['id'];
$text = $result['message']['text'];
$token =$token ;
$text_reply = 'Selamat Datang Ke GFG Shopping Cart';

//------------------------------------------------------------------------------------------

if($text == 'iPhone')$text_reply = 'senarai harga';
if($text == 'aksesori')$text_reply = 'casing, body';
if($text == 'Replacement')$text_reply = 'Lcd, Battery';


//------------------------------------------------------------------------------------------
$url = 'https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$user_id;
$url .= '&text=' .$text_reply;
    
$res = file_get_contents($url);
//------------------------------------------------------------------------------------------
?>