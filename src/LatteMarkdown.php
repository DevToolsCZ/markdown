<?php 

declare(strict_types=1);

namespace Devtoolcz\Markdown;

use Devtoolcz\Markdown\Extra\Parsedown;
use Latte\Runtime\FilterInfo;
use Nette\Utils\Html;

class LatteMarkdown
{
	/** @var Parsedown */
	private $parsedown;

	public function __construct(Parsedown $parsedown) {
		$this->parsedown = $parsedown;
	}
	
	public function apply(FilterInfo $info, $text)
	{
		$html = new Html();
		return $html::el()->setHtml($this->parsedown->parse($text));
	}
}
