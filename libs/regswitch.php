<?php
    if($_GET[reg]=='' and $_SESSION['reg']==''  )
        {
            $_SESSION['reg']=0;
            $menu0='active';
            $menu1='';
            $menu2='';
            $menu3='';
            $menu4='';
        }
    else
        {
            if($_GET[reg]>-1)
            {
                $_SESSION['reg']=$_GET[reg];
            }
        }
    switch($_SESSION['reg'])
        {
            case 1:
                $menu0='';
                $menu1='active';
                $menu2='';
                $menu3='';
                $menu4='';
                break;
            case 2:
                $menu0='';
                $menu1='';
                $menu2='active';
                $menu3='';
                $menu4='';
                break;
            case 3:
                $menu0='';
                $menu1='';
                $menu2='';
                $menu3='active';
                $menu4='';
                break;
            case 4:
                $menu0='';
                $menu1='';
                $menu2='';
                $menu3='';
                $menu4='active';
                break;
            case 5:
                $menu0='';
                $menu1='';
                $menu2='';
                $menu3='';
                $menu4='active';
                break;
            case 6:
                $menu0='';
                $menu1='';
                $menu2='';
                $menu3='';
                $menu4='active';
                break;
            case 7:
                $menu0='';
                $menu1='';
                $menu2='';
                $menu3='';
                $menu4='active';
                break;
            default:
                $menu0='active';
                $menu1='';
                $menu2='';
                $menu3='';
                $menu4='';
                break;
        }
?>