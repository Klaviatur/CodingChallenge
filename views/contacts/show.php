<?php

// SHOW

?>

<table class="full-width" style="max-width: 500px">

    <tbody>
    <?php foreach ($contact->getFields() as $field): ?>
        <tr>
            <td><strong><?php echo $field['name']; ?></strong></td>
            <td style="text-align: center"><?php echo $field['value']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<div>
    <a href="?action=edit&id=<?php echo $id; ?>">Edit</a>
    <a href="?action=delete&id=<?php echo $id; ?>">Delete</a>
</div>
