<?php

	namespace App;

	class Celular {

		private $mapping = array(
			'ABC'  => '2',
			'DEF'  => '3',
			'GHI'  => '4',
			'JKL'  => '5',
			'MNO'  => '6',
			'PQRS' => '7',
			'TUV'  => '8',
			'WXYZ' => '9',
			' '    => '0',
			''     => '_',
		);

		private $texto;
		private $lastGroup;

		public function __construct($texto) {
			$this->texto = str_split($texto);
		}

		private function convertCharToNumeric($char) {
			$result = "";
			foreach($this->mapping as $group => $number) {
				if (strstr($group, $char)) {
					if (!is_null($this->lastGroup)) {
						if ($this->lastGroup == $number) {
							$result .= "_";
						}
					}

					$result .= str_repeat($number, (strpos($group, $char) + 1));
					$this->lastGroup = $number;
					break;
				}
			}

			return $result;
		}

		public function resolve() {
			$result = "";
			foreach ($this->texto as $char) {
				$result .= $this->convertCharToNumeric($char);
			}

			return $result;
		}
	}	

?>