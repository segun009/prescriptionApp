<?php if($lerrors): ?>
    <div class="lerror">
        <?php foreach($lerrors as $lerror): ?>
            <p><?php echo $lerror; ?></p>
        <?php endforeach ?>
    </div>
<?php endif; ?>