<?php

use Cajogos\Biscuit\Template as Template;
use Cajogos\Biscuit\Controller as Controller;

class DefaultController extends Controller
{
	public static function display()
	{
		$tpl = Template::create('pages/homepage.tpl');
		$tpl->assign('name', 'Serhat');
		$tpl->assign('page_title', 'Serhat\'s Homepage');
		$tpl->display();
	}

	public static function hello($name = null, $say = null)
	{
		if (is_null($name))
		{
			$name = 'World';
		}
		if (is_null($say))
		{
			$say = 'Hello';
		}
		$tpl = Template::create('pages/hello.tpl');

		$hello_element = HelloElement::get();
		$hello_element->setName($name);
		$hello_element->setSaying($say);
		$tpl->addElement('hello_element', $hello_element);
		
		$tpl->display();
	}

	public static function goal()
	{
		// Serve the self-contained Life Hub app at the friendly /goal URL.
		// It's a standalone HTML document (not a Smarty template), so output it raw.
		$file = $_SERVER['DOCUMENT_ROOT'] . '/life-hub.html';
		if (is_file($file))
		{
			header('Content-Type: text/html; charset=utf-8');
			readfile($file);
		}
		else
		{
			header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
		}
	}

	public static function markdown()
	{
		$tpl = Template::create('pages/markdown-test.tpl');

		$markdown_el = MarkdownElement::get();
		$markdown_el->setFile('test');
		$tpl->addElement('markdown_element', $markdown_el);

		$tpl->display();
	}
}