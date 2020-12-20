<?php 

declare(strict_types=1);

namespace Devtoolcz\Markdown\Nette\DI;

use Devtoolcz\Markdown\LatteMarkdown;
use Devtoolcz\Markdown\ParseAdapter;
use Nette\Bridges\ApplicationLatte\ILatteFactory;
use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\FactoryDefinition;
use Nette\DI\Definitions\Statement;
use Nette\InvalidStateException;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

class MarkdownExtension extends CompilerExtension 
{
	public function getConfigSchema(): Schema
	{
		return Expect::structure([
			'syntax_helper' => Expect::string()->required()
		]);
	}

	public function loadConfiguration(): void
	{
		$builder = $this->getContainerBuilder();

		$builder->addDefinition($this->prefix('parsedown'))
			->setFactory(ParseAdapter::class);
	}

	public function beforeCompile()
	{
		$builder = $this->getContainerBuilder();

		if($builder->getByType(ILatteFactory::class) === null)
			throw new InvalidStateException(sprintf('Service which implements %s not found.', ILatteFactory::class));

		$config = (array) $this->config;
		$latte = $builder->getDefinitionByType(ILatteFactory::class);
		assert($latte instanceof FactoryDefinition);
		$latte->getResultDefinition()->addSetup('addFilter', $config['syntax_helper'], [new Statement(LatteMarkdown::class)], '');
	}

}