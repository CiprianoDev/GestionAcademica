<?php 
    foreach ($alerts ?? [] as $key => $type):
        foreach ($type as $message):
?>
    <div class="alert <?php echo $key;?>"><?php echo $message;?></div>
<?php
        endforeach;
    endforeach;
?>