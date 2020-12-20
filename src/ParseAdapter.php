<?php

declare(strict_types=1);

use Devtoolcz\Markdown\Extra\Parsedown;
use Nette\SmartObject;

class ParseAdapter
{

	use SmartObject;

	/** @var Parsedown */
	private $parsedown;

	/** @var callable[] */
	public $onProcess = [];

	public function __construct(?Parsedown $parsedown = null) {
		$this->parsedown = $parsedown ?: new Parsedown();
	}

	public function process($text)
	{
		$this->onProcess($text, $this);
		$this->parsedown->parse($text);
	}

	public function processLine($text)
	{
		$this->onProcess($text, $this);
		$this->parsedown->line($text);
	}
}
