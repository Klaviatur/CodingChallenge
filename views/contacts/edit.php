<?php

use CodingChallenge\Models\Contact;

?>

<form action="?action=update" method="POST">

    <input
            id="id"
            name="id"
            type="hidden"
            value="<?php echo $id; ?>"
    />

    <table class="full-width" style="max-width: 500px">

        <tbody>
        <?php foreach ($contact->getFields() as $fieldKey => $field): ?>
            <tr>
                <td><label for="<?php echo $fieldKey; ?>"><?php echo $field['name']; ?></label></td>
                <td>
                    <input
                        id="<?php echo $fieldKey; ?>"
                        name="<?php echo $fieldKey; ?>"
                        type="text"
                        value="<?php echo $field['value']; ?>"
                    />
                </td>
            </tr>
        <?php endforeach; ?>

        <tr class="bg-white">
            <td colspan="2">
                <input class="full-width mt-1" type="submit">
            </td>
        </tr>

        </tbody>

    </table>
</form>
