<?php
/*
pyupyu
*/

require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');

$channelAccessToken = 'Q0GuMIzanZC8ZU/xOdjOpCqTJNGQTShRs7cU5HdCvmEUjhGVVjlmkQ5SY2G2B5V3pYv+ROdvfBxlo47ObHhgJXtODaJ7jDQXODEGOOtITwuLe8lB0E84UF2htNWdwYbaZR0icNIYk+BYwlY3h8ovBQdB04t89/1O/w1cDnyilFU='; //sesuaikan 
$channelSecret = '3e97136e417cabe0ebbafbf403f56720';//sesuaikan

$client = new LINEBotTiny($channelAccessToken, $channelSecret);

$userId 	= $client->parseEvents()[0]['source']['userId'];
$groupId 	= $client->parseEvents()[0]['source']['groupId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$type 		= $client->parseEvents()[0]['type'];

$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];

$profil = $client->profil($userId);
$profileName 	= $profil->displayName;
$profileURL 	= $profil->pictureUrl;
$profileStatus 	= $profil->statusMessage;

$pesan_datang = explode(" ", $message['text']);
$msg_type = $message['type'];
$command = $pesan_datang[0];
$options = $pesan_datang[1];
if (count($pesan_datang) > 2) {
    for ($i = 2; $i < count($pesan_datang); $i++) {
        $options .= '+';
        $options .= $pesan_datang[$i];
    }
}
#-------------------------[Function]-------------------------#
//show menu, saat join dan command,menu
if ($type == 'join' || $command == 'Help') {
    $text .= "==[Main Keywords]==";
    $text .= "> \n";
    $text .= "> Welcome\n";
    $text .= "> Official\n";
    $text .= "> Struktur\n";
    $text .= "> admin\n";
    $text .= "> Key\n";
    $text .= "> Creator\n";
    $text .= "> /myinfo\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Function]-------------------------#
//show menu, saat join dan command,menu
if ($type == 'join' || $command == 'dev') {
    $text .= " \n";
    $text .= " 􀀹⚡⚡⚡⚡⚡⚡⚡⚡􀀹\n";
    $text .= "======[HALLO SOBAT HFI]======";
    $text .= " \n";
    $text .= "Terima Kasih Atas Invite nya\n";
    $text .= "=======================\n";	
    $text .= "=>Developer BOT ketik Creator\n";
    $text .= "=>Jangan Lupa BOTnya di-Add\n";
    $text .= "    dulu ya 􀀅􀀰\n";
    $text .= " 􀀹⚡⚡⚡⚡⚡⚡⚡⚡􀀹\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Function]-------------------------#
if ($type == 'text' || $command == 'Wc') {
    $text .= "====[HALLO WELCOME]====";
    $text .= " \n";
    $text .= "       ⤵Selamat Datang di⤵\n";
    $text .= "=======================\n";	
    $text .= "              H F I\n";	
    $text .= " HAPPY FAMILY INDONESIA";
    $text .= " \n";
    $text .= "=======================\n";	
    $text .= "  Jangan Lupa Cek Note ya\n";
    $text .= "[Salken dari Saya]->$profil->displayName\n";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
#-------------------------[Function]-------------------------#
//show menu, saat join dan command,menu
if ($type == 'text' || $command == 'Key') {
    $text .= "==[Additional Keywords]==";
    $text .= "> \n";
    $text .= "> Bot\n"; 
    $text .= "> Pagi\n";
    $text .= "> Siang\n";
    $text .= "> Sore\n";
    $text .= "> Malam\n";
    $text .= "> Assalamualaikum\n";
    $text .= "> waalaikumsalam\n";
    $text .= "> Hai\n";
    $text .= "> Halo\n";
    $text .= "> Ok\n";
    $text .= "> Udah\n";
    $text .= "> haha [sticker]\n";
    $text .= "> masa [sticker]";
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => $text
            )
        )
    );
}
if($message['type']=='text') {
	    if ($command == '/myinfo') {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(

										'type' => 'text',					
										'text' => '====[InfoProfile]====
Nama: '.$profil->displayName.'

Status: '.$profil->statusMessage.'

Picture: '.$profil->pictureUrl.'

====[InfoProfile]===='
									)
							)
						);
				
	}
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Bot' || $command == 'bot' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => ' kenapa manggil manggil??'.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Bot' || $command == 'bot' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Ada apa ya??'.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Pagi' || $command == 'pagi' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Pagi juga '.$profil->displayName.' Senyum ya!.'
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Siang' || $command == 'siang' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Siang juga '.$profil->displayName.', Jangan lupa makan siang ya'
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Assalamualaikum' || $command == 'assalamualaikum' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'waalaikumsalam wr.wb '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Waalaikumsalam' || $command == 'Waalaikumsalam wr.wb' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Makasih dah jawab salamnya kk '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Sore' || $command == 'sore' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Ngopi dulu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Malam' || $command == 'Night' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Malam juga, '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'baik' || $command == 'Baik' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Tetap Semangat Ya! '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Halo' || $command == 'Hallo' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'HALLO apa kabar '.$profil->displayName.' ?'
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Hai' || $command == 'hai' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'Hai juga '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Udh' || $command == 'udh' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Udah' || $command == 'udah' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Ok' || $command == 'Oke' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'pinter kamu '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'gila' || $command == 'peak' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array(
                    'type' => 'text',
                    'text' => 'ish ish kok gitu ka( '.$profil->displayName
                )
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Welcome' || $command == 'wc' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'imagemap',
  'baseUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1553758996/24/Wc',
  'altText' => 'WELCOME TO HFI',
  'baseSize' => 
  array (
    'height' => 1040,
    'width' => 1040,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'message',
      'text' => 'Official',
      'area' => 
      array (
        'x' => 0,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
    1 => 
    array (
      'type' => 'message',
      'text' => 'staff',
      'area' => 
      array (
        'x' => 520,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Official' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'imagemap',
  'baseUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552224710/HFI2/OFC',
  'altText' => 'OFFICIAL HFI',
  'baseSize' => 
  array (
    'height' => 1040,
    'width' => 1040,
  ),
  'actions' => 
  array (
    0 => 
    array (
      'type' => 'uri',
      'linkUri' => 'https://www.smule.com/OFFICIAL_HFI',
      'area' => 
      array (
        'x' => 520,
        'y' => 0,
        'width' => 520,
        'height' => 1040,
      ),
    ),
  ),
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'admin' || $command == 'Admin' ) {
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'template',
  'altText' => 'ALL STAFF HFI',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274132/HFI2/ADMIN/1552274055900.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/Abiebakrie_',
        ),
      ),
      1 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274161/HFI2/ADMIN/1552274057863.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_HanyBSF',
        ),
      ),
      2 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274148/HFI2/ADMIN/1552274060533.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_ZahraBDG',
        ),
      ),
      3 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552310818/HFI2/ADMIN/1552274062337.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_Abdi_Th3a',
        ),
      ),
    ),
  ),
),
                array (
  'type' => 'template',
  'altText' => 'ALL STAFF HFI',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274148/HFI2/ADMIN/1552274064353.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/LEO_ISSC_NLGASIC',
        ),
      ),
      1 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274135/HFI2/ADMIN/1552274067077.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_Yul176',
        ),
      ),
      2 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274151/HFI2/ADMIN/1552274068869.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_JAGAT_PESEK',
        ),
      ),
      3 => 
      array (
        'imageUrl' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1552274143/HFI2/ADMIN/1552274070949.jpg',
        'action' => 
        array (
          'type' => 'uri',
          'label' => 'SMULE',
          'uri' => 'https://www.smule.com/HFI_DW1C4_S2C',
        ),
      ),
    ),
  ),
),
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'Udah' || $command == 'udah' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'flex',
  'altText' => 'List Staff KOPI24KARAT',
  'contents' => 
  array (
  'type' => 'bubble',
  'header' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'Header text',
      ),
    ),
  ),
  'hero' => 
  array (
    'type' => 'image',
    'url' => 'https://res.cloudinary.com/dmvpko25b/image/upload/v1553759873/24/Ofc/1040.jpg',
  ),
  'body' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'tes tess',
      ),
    ),
  ),
  'footer' => 
  array (
    'type' => 'box',
    'layout' => 'vertical',
    'contents' => 
    array (
      0 => 
      array (
        'type' => 'text',
        'text' => 'tesss',
      ),
    ),
  ),
  "styles": (
    "header": (
      "backgroundColor": "#00ffff"
    ),
    "hero": (
      "separator": true,
      "separatorColor": "#000000"
    ),
    "footer": (
      "backgroundColor": "#00ffff",
      "separator": true,
      "separatorColor": "#000000"
    )
  )
)
            )
        );
    }
}
//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'haha' || $command == 'Haha' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'template',
  'altText' => 'Mimin mengirim sticker',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/sticker/12760021/IOS/sticker_animation@2x.png;compress=true',
        'action' => 
        array (
          'type' => 'message',
          'text' => 'haha',
        ),
      ),
    ),
  ),
)
            )
        );
    }
}//pesan bergambar
if($message['type']=='text') {
	    if ($command == 'masa' || $command == 'Masa' ) {

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
                array (
  'type' => 'template',
  'altText' => 'EMON mengirim sticker',
  'template' => 
  array (
    'type' => 'image_carousel',
    'columns' => 
    array (
      0 => 
      array (
        'imageUrl' => 'https://stickershop.line-scdn.net/stickershop/v1/sticker/44526050/IOS/sticker_animation@2x.png;compress=true',
        'action' => 
        array (
          'type' => 'message',
          'text' => 'masa',
        ),
      ),
    ),
  ),
)
            )
        );
    }
}
if (isset($balas)) {
    $result = json_encode($balas);
//$result = ob_get_clean();

    file_put_contents('./balasan.json', $result);
    if ($profileName) {
        $client->replyMessage($balas);
	} elseif($type == 'join') {
	    $client->replyMessage($balas);
	} else {
	$balas_gagal = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'text',
                'text' => 'Add aku dulu ya kk'
            )
        )
    ); }
	$client->replyMessage($balas_gagal);
}
?>
