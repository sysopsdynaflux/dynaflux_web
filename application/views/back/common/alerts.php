<?php foreach($alerts as $type => $messages): ?>

    <?php if(!empty($messages)): ?>

        <?php if($type == 'warning'): ?>

        <div class="alert">
            
            <a class="close" data-dismiss="alert">×</a>

            <?php foreach($messages as $message): ?>            
            <?php echo $message ?> <br>
            <?php endforeach; ?>

        </div>

        <?php elseif($type == 'success'): ?>

        <div class="alert alert-success">
            
            <a class="close" data-dismiss="alert">×</a>
            
            <?php foreach($messages as $message): ?>            
            <?php echo $message ?> <br>
            <?php endforeach; ?>

        </div>

        <?php elseif($type == 'error'): ?>

        <div class="alert alert-danger">
            
            <a class="close" data-dismiss="alert">×</a>
            
            <?php foreach($messages as $message): ?>            
            <?php echo $message ?> <br>
            <?php endforeach; ?>

        </div>

        <?php elseif($type == 'info'): ?>

        <div class="alert alert-info">
            
            <a class="close" data-dismiss="alert">×</a>
            
            <?php foreach($messages as $message): ?>            
            <?php echo $message ?> <br>
            <?php endforeach; ?>

        </div>

        <?php endif ?>

    <?php endif ?>
    
<?php endforeach ?>