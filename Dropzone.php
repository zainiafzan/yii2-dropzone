<?php
/**
 * @author: Zaini Afzan
 * @created: 14/03/2014 6:03
 * @file: Dropzone
 */

namespace zainiafzan\widget;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class Dropzone extends \yii\base\Widget
{
	public $url;

	public $options = [];

	public $clientEvents = [];


	public function init()
	{
		\Yii::setAlias('@dropzone', dirname(__FILE__));

		if (!isset($this->url)) {
			$this->url = \Yii::$app->urlManager->createUrl('site/upload');
		}

		parent::init();
	}

	public function run()
	{
		echo Html::beginTag('div', ['class' => 'dropzone', 'id' => $this->id]);
		echo Html::endTag('div');
		$this->registerClientScript();
	}

	public function registerClientScript()
	{
		$view = $this->getView();
		DropzoneAsset::register($view);

		$options = ArrayHelper::merge([
			'url' => $this->url,
			'parallelUploads' => true,
		], $this->options);

		$options = Json::encode($options);

		$js = [];
		$js[] = "Dropzone.autoDiscover = false;";
		$js[] = "var $this->id = new Dropzone('div#$this->id',{$options});";

		if (!empty($this->clientEvents)) {
			foreach ($this->clientEvents as $event => $handler) {
				$js[] = ";$this->id.on('$event', $handler);";;
			}
		}
		$view->registerJs(implode("\n", $js));
	}
} 