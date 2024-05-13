<?php $render('partial/header', $data); ?>

    <h1>Books by category</h1>

    <nav class="nav nav-pills my-3">
        <?php foreach ($data['categories'] as $cat) { ?>
            <?php $link($cat->name, 'Books', 'Index', ['cid' => $cat->id], 'nav-link' . ($cat->id == $data['selectedCategoryId'] ? ' active' : ' ')); ?>
        <?php } ?>
    </nav>

<?php if ($data['books'] !== null) {
    if (sizeof($data['books']) > 0) {
        $render('partial/books', ['books' => $data['books'], 'context' => $data['context']]);
    } else { ?>
        <p>No books in this category.</p>
    <?php }
} else { ?>
    <p>Please select a category.</p>
<?php } ?>

<?php $render('partial/footer', $data); ?>