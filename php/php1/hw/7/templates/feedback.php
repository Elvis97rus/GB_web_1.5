<div>
<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Отзыв</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($feedback as $feed): ?>
        <tr>
            <th scope="row"><?= $feed['id_feedback'] ?></th>
            <td><?= $feed['feedback_user'] ?></td>
            <td><?= $feed['feedback_body'] ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</div>