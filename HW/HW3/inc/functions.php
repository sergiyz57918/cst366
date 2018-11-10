<?php
//Algorythms provided curtocy of https://www.programmingalgorithms.com

//Simple Substitution Cipher
function subCipher($input, $oldAlphabet, $newAlphabet, &$output)
{
	$output = "";
	$inputLen = strlen($input);

	if (strlen($oldAlphabet) != strlen($newAlphabet))
		return false;

	for ($i = 0; $i < $inputLen; ++$i)
	{
		$oldCharIndex = strpos($oldAlphabet, strtolower($input[$i]));

		if ($oldCharIndex !== false)
			$output .= ctype_upper($input[$i]) ? strtoupper($newAlphabet[$oldCharIndex]) : $newAlphabet[$oldCharIndex];
		else
			$output .= $input[$i];
	}

	return true;
}

function subEncipher($input, $cipherAlphabet, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return subCipher($input, $plainAlphabet, $cipherAlphabet, $output);
}

function subDecipher($input, $cipherAlphabet, &$output)
{
	$plainAlphabet = "abcdefghijklmnopqrstuvwxyz";
	return subCipher($input, $cipherAlphabet, $plainAlphabet, $output);
}

//Simple Shift Cipher
function shiftCipher($ch, $key)
{
	if (!ctype_alpha($ch))
		return $ch;

	$offset = ord(ctype_upper($ch) ? 'A' : 'a');
	return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
}

function shiftEncipher($input, $key)
{
	$output = "";

	$inputArr = str_split($input);
	foreach ($inputArr as $ch)
		$output .= shiftCipher($ch, $key);

	return $output;
}

function shiftDecipher($input, $key)
{
	return shiftEncipher($input, 26 - $key);
}

//Vigenere Cipher
function Mod($a, $b)
{
	return ($a % $b + $b) % $b;
}

function vigenereCipher($input, $key, $encipher)
{
	$keyLen = strlen($key);

	for ($i = 0; $i < $keyLen; ++$i)
		if (!ctype_alpha($key[$i]))
			return ""; // Error

	$output = "";
	$nonAlphaCharCount = 0;
	$inputLen = strlen($input);

	for ($i = 0; $i < $inputLen; ++$i)
	{
		if (ctype_alpha($input[$i]))
		{
			$cIsUpper = ctype_upper($input[$i]);
			$offset = ord($cIsUpper ? 'A' : 'a');
			$keyIndex = ($i - $nonAlphaCharCount) % $keyLen;
			$k = ord($cIsUpper ? strtoupper($key[$keyIndex]) : strtolower($key[$keyIndex])) - $offset;
			$k = $encipher ? $k : -$k;
			$ch = chr((Mod(((ord($input[$i]) + $k) - $offset), 26)) + $offset);
			$output .= $ch;
		}
		else
		{
			$output .= $input[$i];
			++$nonAlphaCharCount;
		}
	}

	return $output;
}

function vigenereEncipher($input, $key)
{
	return vigenereCipher($input, $key, true);
}

function vigenereDecipher($input, $key)
{
	return vigenereCipher($input, $key, false);
}

?>