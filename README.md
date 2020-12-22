### devtoolscz/markdown

**Introduction**
Parsedown/Markdown is easy syntax language for formating text like a texy.
Library is created for Nette Framework, Latte Templates.

**Versions**
| STATE  | VERSION  | BRANCH  | NETTE | PHP |
| :------------: | :------------: | :------------: | :------------: | :------------: |
| Stable  | v1.0 | master | 3.0 | >=7.2  |

**Setup**
Recommended way to install is via composer.
> composer require devtoolcz/markdown

```yaml
extensions:
    markdown: Devtoolcz\Markdown\Nette\DI\MarkdownExtension
```

**Configuration**
```yaml
markdown:
    syntax_helper: parsedown
```
**Usage**
```smarty
{block content}
	{var $text_test = 'Tohle je test. Je __skvělý__'}
	{$text_test|parsedown}
{/block}
```
