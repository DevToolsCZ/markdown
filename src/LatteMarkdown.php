<?php 

declare(strict_types=1);

namespace Devtoolcz\Markdown;

use Devtoolcz\Markdown\Extra\Parsedown;
use Latte\Runtime\FilterInfo;
use ParseAdapter;

class LatteMarkdown
{
	/** @var ParseAdapter */
	private $parseAdapter;

	public function __construct(ParseAdapter $parseAdapter) {
		$this->parseAdapter = $parseAdapter;
	}
	
	public function apply(FilterInfo $filterInfo, $text)
	{
		$this->parseAdapter->process($text);
	}

}
