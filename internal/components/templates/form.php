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
            case "datetime":?>
                <input class="calendar-input readonly"
                    name="<?= $field["name"] ?>"
                    type="text" 
                    placeholder="<?= $field["placeholder"] ?>" 
                    <?= $field["required"] ? "required": "" ?> >
                
                    <div class="calendar-container">
                        <div class="calendar">
                            <!-- Календарь -->
                            <header class="calendar-header">
                                <button class="prev-month" type="button">&lt;</button>
                                <span class="month-year bold"></span>
                                <button class="next-month" type="button">&gt;</button>
                            </header>
                            <div class="calendar-body">
                                <div class="weekdays">
                                    <span>Пн</span>
                                    <span>Вт</span>
                                    <span>Ср</span>
                                    <span>Чт</span>
                                    <span>Пт</span>
                                    <span>Сб</span>
                                    <span>Вс</span>
                                </div>
                                <div class="days"></div>
                            </div>
                        </div>

                        <div class="time-picker">
                            <!-- Выбор времени -->
                            <ul class="time-options">
                                <li>
                                    <h4>Утро</h4>
                                    <label>
                                        <input type="radio" name="time" value="09:00"> 09:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="10:00"> 10:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="11:00"> 11:00
                                    </label>
                                </li>
                                <li>
                                    <h4>День</h4>
                                    <label>
                                        <input type="radio" name="time" value="12:00"> 12:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="13:00"> 13:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="14:00"> 14:00
                                    </label>
                                </li>
                                <li>
                                    <h4>Вечер</h4>
                                    <label>
                                        <input type="radio" name="time" value="15:00"> 15:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="16:00"> 16:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="17:00"> 17:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="18:00"> 18:00
                                    </label>
                                    <label>
                                        <input type="radio" name="time" value="19:00"> 19:00
                                    </label>
                                </li>
                            </ul>
                            <button class="apply-btn fill" type="button">Принять</button>
                        </div>
                    </div>

                <?php break;
        endswitch;
    endforeach; ?>
    <button class="fill bold" type="submit">Отправить</button>
</form>
