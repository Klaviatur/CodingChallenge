<table class="full-width" style="max-width: 500px; margin: 0 auto;">

    <tbody>
    <?php foreach ($contact->getFields() as $field): ?>
        <tr>
            <td><strong><?php echo $field['name']; ?></strong></td>
            <td style="text-align: center"><?php echo $field['value']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>

<div class="mt-1" style="text-align: center">
    <a href="?action=edit&id=<?php echo $id; ?>">Edit</a>
    <a href="?action=delete&id=<?php echo $id; ?>">Delete</a>
</div>
