<?php namespace Muleta\Library\Utils;

// Dependencies
use Lang;
use InvalidArgumentException;

// Utilities for dealing with strings
class Text {

	/**
	 * 	 * Get the bytes from a PHP human-size style string
	 * 	 * https://regex101.com/r/5AqXle/2
	 * 	 *
	 *
	 * @param string $val
	 *
	 * @return float
	 *
	 * @throws InvalidArgumentException
	 */
	static public function bytesFromHuman($val): float {

		// Seperate number from unit
		if (!preg_match('#^([\d\.]+)(.*)$#', $val, $matches)) {
			throw new InvalidArgumentException('Pattern not matched');
		}

		// Get the parts
		$val = $matches[1];
		$unit = strtolower(trim($matches[2]));

		// Calculate the bytes
		switch($unit) {
			case 'gigabytes':
			case 'gb':
			case 'g': $val *= 1024;
			case 'megabytes':
			case 'mb':
			case 'm': $val *= 1024;
			case 'kilobytes':
			case 'kb':
			case 'k': $val *= 1024;
		}

		// Return the bytes
		return round($val);
	}

	/**
	 * Convert a size in bytes to human readable
	 * http://php.net/manual/en/function.filesize.php#106569
	 *
	 * @param  int  $bytes
	 * @param  int $decimals
	 * @return string
	 */
	static public function humanSize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}

	/**
	 * Replace the last whitespace in a string in a string with a &nbsp; to prevent orphans.
	 * Essentially makes the last two words wrap together.  Regexp inspired by:
	 * http://frightanic.wordpress.com/2007/06/08/regex-match-last-occurrence/
	 */
	static public function noOrphan($text) {
		if (substr_count($text, ' ') < 3) return $text; // Require > 3 words
		return preg_replace('#\s+(?!.*\s)#', '&nbsp;', $text);
	}

	/**
	 * Show a human timestamp for how much time has elapssed since the timestamp
	 * Adapted from http://www.zachstronaut.com/posts/2009/01/20/php-relative-date-time-string.html
	 */
	static public function timeElapsed($ptime, $options = null) {

		// Default options
		if (!$options) $options = array();
		$options = array_merge(array(
			'pluraling' => true,
			'spacing' => true,
			'labels' => array(
				'0 seconds',
				'second',
				'minute',
				'hour',
				'day',
				'month',
				'year',
			)
		), $options);

		$etime = time() - $ptime;
		if ($etime < 1) { return $options['labels'][0]; }

		$a = array( 12 * 30 * 24 * 60 * 60  =>  $options['labels'][6],
		            30 * 24 * 60 * 60       =>  $options['labels'][5],
		            24 * 60 * 60            =>  $options['labels'][4],
		            60 * 60                 =>  $options['labels'][3],
		            60                      =>  $options['labels'][2],
		            1                       =>  $options['labels'][1],
		            );

		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				if ($options['pluraling']) return $r . ($options['spacing']?' ':'') . $str . ($r > 1 ? 's' : '');
				else return $r .($options['spacing']?' ':''). $str;
			}
		}
	}

	/**
	 * 	 * Convert a key / slug into a friendly title string
	 *
	 * @param string $keyword i.e. "some_multi_key"
	 *
	 * @return scalar i.e. "Some multi key"
	 */
	static public function titleFromKey($keyword) {

		// Check for the keyword in Laravel's translation system
		if (class_exists('Lang')) {
			if (Lang::has('admin.'.$keyword) && ($title = Lang::get('admin.'.$keyword)) && is_scalar($title)) return $title;
			if (Lang::has($keyword) && ($title = Lang::get($keyword)) && is_scalar($title)) return $title;
		}

		// Otherwise, auto format it
		$keyword = preg_replace('#_at$#', ' date', $keyword);
		$keyword = str_replace('_', ' ', $keyword);
		return ucfirst($keyword);
	}

	/**
	 * 	 * Remove everything up the substring from a string.
	 * 	 * Ex: trimUntil('/var/www/site/public/uploads/01/01/file.jpg', '/uploads');
	 *
	 * @param string $str The string that we're trimming
	 * @param string $substr The string that indicates where to stop trimming
	 *
	 * @return false|string
	 */
	static public function trimUntil($str, $substr) {
		$pos = strpos($str, $substr);
		if ($pos === false) return $str;
		return substr($str, $pos);
	}
}
