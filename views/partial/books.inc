<table class="table align-middle table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th colspan="2">In cart</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data['books'] as $book) : ?>
        <tr>
            <td><?php $htmlOut($book->title); ?></td>
            <td><?php $htmlOut($book->author); ?></td>
            <td><?php $htmlOut($book->price); ?></td>
            <td><?php $htmlOut($book->cartCount); ?></td>
            <td>
                <div class="d-flex">
                    <?php $beginForm('Cart', 'Add', ['bid' => $book->id, 'ctx' => $data['context']], 'post', 'form-inline'); ?>
                    <button class="btn btn-outline-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                    </button>
                    <?php $endForm(); ?>
                    <?php $beginForm('Cart', 'Remove', ['bid' => $book->id, 'ctx' => $data['context']], 'post', 'form-inline ms-2'); ?>
                    <button class="btn btn-outline-danger" <?php if (!$book->isInCart) { ?> disabled<?php } ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-dash-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8"/>
                        </svg>
                    </button>
                    <?php $endForm(); ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>