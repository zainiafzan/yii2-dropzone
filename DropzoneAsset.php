<?php
/**
 * @author: Zaini Afzan
 * @created: 14/03/2014 6:05
 * @file: DropzoneAsset
 */

namespace zainiafzan\widget;


class DropzoneAsset extends \yii\web\AssetBundle
{
	public $sourcePath = '@dropzone/assets';

	public $js = [
		'js/dropzone.js'
	];

	public $css = [
		'css/dropzone.css'
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];
} 