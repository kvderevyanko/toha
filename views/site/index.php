<?php

/* @var $this yii\web\View */

$this->title = 'Главная';
?>
<div class="site-index">
    <div class="row">

        <!--Начало блока-->
        <div class="col-sm-6">
            <div class="deviceBlock"  id="alertvnx">
                <h4>Первая камера</h4>
                <div class="clearBlock btn btn-info">Очистить блок</div>
                <div class="deviceInfo"></div>
            </div>
        </div>
        <!--Конец блока-->


    </div>
</div>
<script>
    let urlCheckDevice = "<?=\yii\helpers\Url::to(['check-device'])?>";
</script>
<?php
$this->registerJs(<<<JS

/* Начало блока */
setInterval(function() {
  let device = 'alertvnx'; //имя устройства
  let min = 2; //минимальное количество записей
  $.get(urlCheckDevice, {device:device, min:min}, function(data) {
      if(Number(data['count']) >= min) {
          createDeviceInfo(data);
      }
    console.log(data)
  }) 
}, 5000); //Время между запросами в милисекундах
/* Конец блока */


$(".clearBlock").on('click', function() {
  $(this).parent().find('.deviceInfo').html('');
})

function createDeviceInfo(info) {
  let block = $("#"+info['device']);
  block.find(".deviceInfo").prepend('<div class="alert alert-info" role="alert">' +
   'Срабатываний: '+info['count']+', время сервера: '+info['datetime']+
    '</div>')
}
JS
);

$this->registerCss(<<<CSS
.col-sm-6 {
    margin-bottom: 15px;
}

.deviceInfo {
    margin-top: 15px;
}

.deviceInfo .alert {
    margin-bottom: 1px;
}
CSS
);