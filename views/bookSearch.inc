<?php $render('partial/header', $data); ?>

    <h1>Search</h1>

    <div class="mb-3">
        <?php $beginForm('Books', 'Search'); ?>
        <div class="row g-2">
            <div class="col-auto">
                <input class="form-control" name="f" placeholder="Enter filter..."
                       value="<?php $htmlOut($data['filter']); ?>">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
        <?php $endForm(); ?>
    </div>

<?php if ($data['books'] !== null) {
    if (sizeof($data['books']) > 0) {
        $render('partial/books', ['books' => $data['books'], 'context' => $data['context']]);
    } else { ?>
        <p>No matching books found.</p>
    <?php }
} else { ?>
    <p>Please enter a search term.</p>
<?php } ?>

<?php $render('partial/footer', $data); ?>