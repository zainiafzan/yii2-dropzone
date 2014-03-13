Dropzone Js Yii2 Widget
=======================
Dropzone Js for Yii2 Widget

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zainiafzan/yii2-dropzone "*"
```

or add

```
"zainiafzan/yii2-dropzone": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \zainiafzan\widget\Dropzone::widget([
		'options' => [
			'addRemoveLinks' => true,
		],
		'clientEvents' => [
			'complete' => "function(file){console.log(file)}",
			'removedfile' => "function(file){alert(file.name + ' is removed')}",
			'sending' => "function(file, xhr, formData){formData.append('".Yii::$app->request->csrfParam."','".Yii::$app->request->getCsrfToken() ."')}"
		]
	])?>```