<?php
if( $_SESSION['user']['role'] == 1):
    require('libs/db.php'); 
    $itemspage=paginate(R::count('users'), $_GET['page'], 5);
    $users=R::loadAll('users',  $itemspage['ids']);
    if( $itemspage['factpage'] == 1 ){ $prev='disabled';}
    else{$prev='';}
    if( $itemspage['factpage'] == $itemspage['total'] ){ $next='disabled';}
    else{$next='';}
?>
<div class="container">
    <div class="row">
        <div class="col-2"> </div>
            <div class="col-8">


            <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php echo $prev ?>"> <a class="page-link" href="index.php?reg=1&page=<?php echo $itemspage['factpage']-1 ?>" tabindex="-1" aria-disabled="true">Предыдущая страница</a> </li>
    <?php
        for ($i = 1; $i <= $itemspage['total']; $i++) 
        {
            if( $i == $itemspage['factpage'] ){ $active='active'; }
            else{$active='';}
            echo '<li class="page-item '.$active.'"><a class="page-link" href="index.php?reg=1&page='.$i.'">'.$i.'</a></li>';
        }
    ?>
    <li class="page-item <?php echo $next ?>"><a class="page-link" href="index.php?reg=1&page=<?php echo $itemspage['factpage']+1 ?>">Следующая страница</a></li>
  </ul>
</nav>

                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Логин</th>
                            <th scope="col">Почта</th>
                            <th scope="col">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($users as $user)
                        {?>
                        <tr>
                            <th scope="row"><?php echo $user->id; ?></th>
                            <td><?php echo $user->login;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->level->name;?></td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        <div class="col-2"> </div>
    </div>
</div>

<?php else: ?>
    <script>location.replace("index.php?login=false");</script>
<?php endif; ?>