<div class="fileinput fileinput-new" data-provides="fileinput">
    <div class="input-group">
        <div class="form-control uneditable-input span3" data-trigger="fileinput">
            <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new"><?= \Yii::t('file-input', 'Select file') ?></span>
            <span class="fileinput-exists"><?= \Yii::t('file-input', 'Change')?></span>
            <?=$field;?>
        </span>
        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">
            <?= \Yii::t('file-input', 'Remove') ?>
        </a>
    </div>
</div>
