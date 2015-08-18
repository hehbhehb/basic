<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Library */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libraries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->library_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->library_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'library_id',
            'name',
        ],
    ]) ?>

</div>

<div class="mstudent-course-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'book_id', 
            'name', 
/*    
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete}'],    
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
                'urlCreator' => function ($action, $model, $key, $index) {
                    $params = ['id' => $model->book_id];
                    $params[0] = 'book' . '/' . $action;
                    return Url::toRoute($params);
                },            
            ],
*/            
        ],
    ]); ?>

</div>

<div class="mgroup-student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($book, 'book_id')->dropDownList(\yii\helpers\ArrayHelper::map(
        \app\models\Book::find()->all(),
        'book_id',
        'name'
    ), ['prompt'=>'']) ?>


	<div class="form-group">
        <?= Html::submitButton('Insert Book', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



