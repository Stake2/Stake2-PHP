<?php 

# File.php

class File extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public function Verbose($file, $text) {
		return False;
	}

	public function Sanitize($file) {
		$restricted_characters = [
			":",
			"?",
			'"',
			"|",
			"*",
			"<",
			">",
			"/"
		];

		return str_replace($restricted_characters, "", $file);
	}

	public function Exist($file) {
		if (file_exists($file) == True) {
			return True;
		}

		else {
			return False;
		}
	}

	public function Extension($file, $add_dot = True) {
		$extension = "";

		if ($add_dot == True) {
			$extension .= ".";
		}

		$extension .= pathinfo($file, PATHINFO_EXTENSION);

		return $extension;
	}

	public function Create($file) {
		if (
			$this -> switches["testing"] == False and
			$this -> Exist($file) == False
		) {
			fopen($file, "w");
		}
	}

	public function Delete($file) {
		unlink($file);
	}

	public function Copy($file) {
		
	}

	public function Move($file) {
		
	}

	public function Edit($file, $text, $mode) {
		$file = fopen($file, $mode);

		if ($this -> switches["testing"] == False) {
			fwrite($file, $text);
		}

		fclose($file);
	}

	public function Replace_Text($line) {
		$items = array("\r\n");

		return str_replace($items, "", $line);
	}

	public function Contents($file, $add_br = True, $add_n = True) {
		$contents = [
			"lines" => [],
			"string" => "",
			"length" => count(file($file))
		];

		$read = fopen($file, "r", "UTF-8");

		if ($this -> Exist($file) == True) {
			while(!feof($read)) {
				$line = fgets($read);

				array_push($contents["lines"], $this -> Replace_Text($line));
			}

			$i = 0;
			foreach ($contents["lines"] as $line) {
				$contents["string"] .= $line;
			
				if ($i != $contents["length"] - 1) {
					if ($add_br == True) {
						$contents["string"] .= "<br />";
					}

					if ($add_n == True) {
						$contents["string"] .= "\n";
					}
				}
			
				$i++;
			}

			fclose($read);
		}

		if (
			array_keys($contents["lines"]) == [0] and
			array_values($contents["lines"]) == [""]
		) {
			$contents["lines"] = [];
		}

		return $contents;
	}

	public function Dictionary($file) {
		$dictionary = [];

		$lines = file($file);

		foreach ($lines as $line) {
			if (strpos($line, ": ") == True) {
				$split = explode(": ", $line);

				$key = $split[0];
				$value = $split[1];
				$value = $this -> Replace_Text($value);

				$dictionary[$key] = $value;
			}
		}

		return $dictionary;
	}
}

?>