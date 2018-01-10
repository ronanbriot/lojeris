</main>

<footer class="site-footer">
    <div class="container">
        Copyright © 2013 Lojeris
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php if (isset($footer["js"])) : ?>
    <?php foreach ($footer["js"] as $js) : ?>
        <script src="<?php echo $js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<script src="js/script.js"></script>
</body>
</html>
