
<?php
if( $_SESSION['user']['role'] == 1 or $_SESSION['user']['role'] ==3):
    require('libs/db.php'); 
if( isset($_POST['savework']) )
{
    $errors=array();
    if( trim($_POST['header'])=='' )
        {
            $errors[]='Введите, пожалуйста, название работы!';
        }
    if( trim($_POST['superkey'])=='' )
        {
            $errors[]='Введите, пожалуйста, уникальный номер работы!';
        }
    if( trim($_POST['ask1'])=='' )
        {
            $errors[]='Введите, пожалуйста, текст первого вопроса!';
        }
    if( trim($_POST['right1'])=='' )
        {
            $errors[]='Введите, пожалуйста, правильный ответ на первый вопрос!';
        }
    
    if( empty($errors) )
        {
            if( isset($_GET['workid']) )
            {
                $work = R::load( 'works', $_GET['workid'] );                     // reload the work
            }
            else
            {
                $work = R::dispense('works');                       // creates a work
                $work->header = $_POST['header'];                   // sets work's title
                $work->superkey = $_POST['superkey'];               // sets it's unique key in users store
                $work->date = time();                               // the time of creation
                $newworkid = R::store($work);                       // a new work's been saved
                $work = R::load( 'works', $newworkid );                     // reload the work
            }

            $ask = R::dispense('asks');                                 // create an ask
            $ask->text = $_POST['ask1'];                                // set its text
            $ask->right = $_POST['right1'];                             // its answer
            $asktowork = R::dispense('asktowork');                      // glue table
            $asktowork->name = '1';                                     // the number of the new ask in the current work
            $work->sharedAsktoworkList[] = $asktowork;                  // relation for work
            $ask->sharedAsktoworkList[] = $asktowork;                   // relation for ask
            R::storeAll( [$work, $ask] );                               // lets store all this!

            //sendappmessage('Регистрация', 'success', "успешно!");
            //header('Location: index.php');
            //exit();  
        }
    else
        {
            sendappmessage('Регистрация', 'danger', array_shift($errors));
            //header('Location: index.php?reg=1'); 
            echo '<script>location.replace("index.php?reg=1");</script>'; 
            exit();  
        }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <?php 
                $itemspage=paginate(R::count('works'), $_GET['page'], 5);
                $works=R::loadAll('works',  $itemspage['ids']);
                if( $itemspage['factpage'] == 1 ){ $prev='disabled';}
                else{$prev='';}
                if( $itemspage['factpage'] == $itemspage['total'] ){ $next='disabled';}
                else{$next='';}
            ?>

            <ul>
                <?php 
                    foreach($works as $work)
                    {
                        echo '<li><a href="index.php?reg=1&workid='.$work->id.'">'.$work->header.'</a></li>';
                    }
                ?>
            </ul>             
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Работа для учеников
                    <?php
                        if( isset($_GET['workid']) )
                        {
                            $openedwork=R::load('works', $_GET['workid']);
                        }
                    
                    ?>


                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>
                            <form action="index.php?reg=1" method="POST">
                                <p>
                                    <p><strong>Введите название работы</strong></p>
                                    <input type="text" name="header" value="<?php echo $openedwork->header;?>">
                                </p>
                                <p>
                                    <p><strong>Введите уникальный номер работы</strong></p>
                                    <input type="text" name="superkey" value="<?php echo print_r(end($openedwork->sharedAsktoworkList));?>">
                                </p>
                                <?php for ($i = 1; $i <= 2; $i++) { ?>
                                <p>
                                    <p><strong>Введите текст вопроса №<?php echo $i;?></strong></p>
                                    <input type="text" name="ask<?php echo $i;?>">

                                    <p><strong>Введите правильный ответ на вопрос №<?php echo $i;?> </strong></p>
                                    <input type="text" name="right<?php echo $i;?>">
                                </p>
                                
                                <?php }?>
                                
                                <p>
                                    <button type="submit" name="savework">Сохранить изменения</button>
                                </p>
                            </form>
                        </p>
                                
                    </blockquote>
                  </div>
                </div>
        </div>

        <div class="col-2">
             
        </div>
    </div>


</div>

<?php else: ?>
    <script>location.replace("index.php?login=false");</script>
<?php endif; ?>




