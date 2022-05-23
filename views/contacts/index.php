<?php

// INDEX

?>

<table class="full-width">

    <thead>
    <tr>
        <?php foreach ((new \CodingChallenge\Models\Contact())->getFields() as $field): ?>
            <th><?php echo $field['name']; ?></th>
        <?php endforeach; ?>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <tbody>
        <?php foreach ($contacts as $i => $contact): ?>
            <tr>
                <?php foreach ($contact->getFields() as $field): ?>
                    <td><?php dump($field['value']); ?></td>
                <?php endforeach; ?>
                <th><a href="?action=show&id=<?php echo $i; ?>">Show</a></th>
                <th><a href="?action=edit&id=<?php echo $i; ?>">Edit</a></th>
                <th><a href="?action=delete&id=<?php echo $i; ?>">Delete</a></th>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>