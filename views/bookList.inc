<?php $render('partial/header', $data); ?>

<h1>Booklist</h1>

<nav>
    <?php foreach ($data['categories'] as $cat){ ?>
        <?php $link($cat->name, 'Books', 'Index', ['cid' => $cat->id], 'nav-link');?>
        //TODO continue here
    <?php } ?>
</nav>
<p>Todo list of categories</p>
<p>Todo list of books for category</p>

<?php $render('partial/footer', $data); ?>