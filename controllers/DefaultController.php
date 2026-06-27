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
		// Server-side login for the Life Hub: real HTTP Basic Auth (a browser
		// username/password prompt). Robust on any PHP host — no .htaccess needed.
		$user = 'SerhatDereli';
		// bcrypt hash of the password (one-way; the plaintext is never stored).
		// To change it, run: php -r "echo password_hash('NEW-PASSWORD', PASSWORD_BCRYPT);"
		// and paste the result below.
		$hash = '$2y$12$zgXJSNv7u02ADkzbUTQPdeEqcago9dNPhAVWm92DJm9DCJrnYnFWK';

		list($u, $p) = self::basicAuthCreds();
		if ($u !== $user || !password_verify($p, $hash))
		{
			header('WWW-Authenticate: Basic realm="Life Hub"');
			header($_SERVER['SERVER_PROTOCOL'] . ' 401 Unauthorized');
			echo 'Authentication required.';
			return;
		}

		// Authenticated — serve the self-contained Life Hub app (standalone HTML).
		$file = $_SERVER['DOCUMENT_ROOT'] . '/life-hub.html';
		if (is_file($file))
		{
			header('Content-Type: text/html; charset=utf-8');
			// Passed server auth already → skip the in-page passcode screen so it's one login.
			$html = file_get_contents($file);
			$inject = '<script>try{localStorage.setItem(\'serhat.hub.unlocked.v1\', \'1\');}catch(e){}</script>';
			echo str_replace('</body>', $inject . '</body>', $html);
		}
		else
		{
			header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
		}
	}

	private static function basicAuthCreds()
	{
		if (isset($_SERVER['PHP_AUTH_USER']))
		{
			return array($_SERVER['PHP_AUTH_USER'], isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '');
		}
		// Fallback for CGI/FastCGI setups where PHP_AUTH_* isn't populated.
		$header = '';
		if (isset($_SERVER['HTTP_AUTHORIZATION']))
		{
			$header = $_SERVER['HTTP_AUTHORIZATION'];
		}
		elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION']))
		{
			$header = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
		}
		if (strpos($header, 'Basic ') === 0)
		{
			$decoded = base64_decode(substr($header, 6));
			if ($decoded !== false && strpos($decoded, ':') !== false)
			{
				return explode(':', $decoded, 2);
			}
		}
		return array('', '');
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