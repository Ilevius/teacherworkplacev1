<?php

function sendappmessage($from, $type, $text)
    {
        setcookie('appmessage[from]', $from, time()+5, '/');
        setcookie('appmessage[type]', $type, time()+5, '/');
        setcookie('appmessage[text]', $text, time()+5, '/');
    }

function showappmessage()
  {
    if( isset($_COOKIE['appmessage']) )
    {
        echo "<div class='alert alert-".$_COOKIE['appmessage']['type']." alert-dismissible fade show' role='alert'>";
        echo "<strong>".$_COOKIE['appmessage']['from'].': '.$_COOKIE['appmessage']['text']."</strong>";
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button></div>';
    }
  }
  function paginate($itemsnumber, $page, $portion=25)
  { 
  // принимает количество записей, по сколько их выводить и номер требуемой страницы, возвращает массив айдишек
    $pages = ceil($itemsnumber/$portion);     // the mount of pages 
    $page = intval($page);
    if( $page>$pages or $page<1 or $itemsnumber<$portin ){$page=1;}
    $fin=$portion*$page;
    if( $fin>$itemsnumber ){$fin=$itemsnumber;}
    $ids=range($portion*($page-1)+1, $fin);
    $result['total'] = $pages;
    $result['ids'] = $ids;
    $result['factpage']=$page;
    return $result;
  }

  function createlevels()
  {
    require('libs/db.php');
    $level=R::dispense('level');
    $level->name='администратор';
    R::store($level);

    $level=R::dispense('level');
    $level->name='старший преподаватель';
    R::store($level);

    $level=R::dispense('level');
    $level->name='преподаватель';
    R::store($level);

    $level=R::dispense('level');
    $level->name='ученик';
    R::store($level);

    $level=R::dispense('level');
    $level->name='подписчик';
    R::store($level);
  }


?>