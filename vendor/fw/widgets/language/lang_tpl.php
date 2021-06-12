<select name="lang" id="lang">
    <option value="<?= $this->language['code']; ?>"><?= $this->language['title']; ?></option>
    <?php foreach ($this->languages as $k => $v): ?>
        <?php if ($k != $this->language['code']): ?>
            <option value="<?= $k; ?>"><?= $v['title']; ?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>