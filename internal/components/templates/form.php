<form>
    <h3>Форма</h3>
    <?php foreach($fields as $field): 
        switch ($field["type"]):
            case "text":?>
                <input type="text" 
                    name="<?= $field["name"] ?>"
                    placeholder="<?= $field["placeholder"] ?>" 
                    <?= $field["required"] ? "required": "" ?> >
                
                <?php break; 
            case "selector":?>
                <input class="selector-input readonly"
                    name="<?= $field["name"] ?>"
                    type="text" 
                    placeholder="<?= $field["placeholder"] ?>" 
                    <?= $field["required"] ? "required": "" ?> >
                
                <ul class="selector-options" for="<?= $field["name"] ?>">
                    <?php foreach ($field["values"] as $value): ?>
                        <li class="option"> <?= $value ?> </li>
                    <?php endforeach; ?>
                </ul>

                <?php break;
        endswitch;
    endforeach; ?>
    <button class="fill bold" type="submit">Отправить</button>
</form>
