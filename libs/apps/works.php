
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
    if( trim($_POST['ask'][0])=='' )
        {
            $errors[]='Введите, пожалуйста, текст первого вопроса!';
        }
    if( trim($_POST['right'][0])=='' )
        {
            $errors[]='Введите, пожалуйста, правильный ответ на первый вопрос!';
        }
    
    if( empty($errors) )
        {
            if( isset($_GET['workid']) )
            {
                //$work = R::load( 'works', $_GET['workid'] );                     // reload the work
            }
            else
            {
                $work = R::dispense('works');                       // creates a work
                $work->header = $_POST['header'];                   // sets work's title
                $work->superkey = $_POST['superkey'];               // sets it's unique key in users store
                $work->date = time();                               // the time of creation
                foreach($_POST['ask'] as $key => $value)
                {
                    $ask = R::dispense('asks');
                    $ask->text = $value;                                // set its text
                    $ask->right = $_POST['right'][$key];                // its answer
                    $ask->sharedWorksList[]=$work;
                    R::store($ask);
                }
            }
            echo '<script>location.replace("index.php?reg=1");</script>'; 
            exit();  




            //sendappmessage('Регистрация', 'success', "успешно!");
            //header('Location: index.php');
            //exit();  
        }
    else
        {
            //sendappmessage('Регистрация', 'danger', array_shift($errors));
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
                $itemspage=paginate(R::count('works'), $_GET['page'], 10);
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
                        if( isset($_GET['workid']) )                    // если учитель нажал на работу для ее редактирования
                        {
                            $openedwork = R::load('works', $_GET['workid']);// находим работу по айди
                            $asks = $openedwork->sharedAsks;
                        }
                        elseif( isset($_GET['asknumber']) )
                        {
                            $asks = range(1, $_GET['asknumber']);
                        }
                        else
                        {
                            $asks = range(1, 2);
                        }
                    
                    ?>


                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>
                            <form action="index.php?reg=1" method="POST">
                                <div class="form-group">
                                    <label for="WorkHeader">Заголовок работы</label>
                                    <textarea name="header" class="form-control" id="WorkHeader" rows="3"><?php echo $openedwork->header;?></textarea>
                                </div>
                                <p>
                                    <p><strong>Введите уникальный номер работы</strong></p>
                                    <input type="text" name="superkey" value="<?php echo $openedwork->superkey;?>">
                                </p>
                                <?php $i=1; foreach($asks as $ask) { ?>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="ask">Вопрос №<?php echo $i;?></label>
                                            <textarea name="ask[]" class="form-control" id="ask" rows="3"><?php echo $ask->text;?></textarea>
                                        </div>                                   
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="answer">ответ</label>
                                            <textarea name="right[]" class="form-control" id="answer" rows="3"><?php echo $ask->right;?></textarea>
                                        </div> 
                                    </div>
                                </div>
                                
                                <?php $i++; }?>
                                
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




