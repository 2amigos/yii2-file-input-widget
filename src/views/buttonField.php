<div class="fileinput fileinput-new" data-provides="fileinput">
    <span class="btn btn-light btn-file">
        <span class="fileinput-new"><?= \Yii::t('file-input', 'Select file') ?></span>
        <span class="fileinput-exists"><?= \Yii::t('file-input', 'Change') ?></span>
        <?=$field;?>
    </span>
    <span class="fileinput-filename"></span>
    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
</div>
