<?PHP

use App\Celular;

class CelularTest extends PHPUnit_Framework_TestCase {

	public function testSingleLetter() {
		$letterA = new Celular('A');
		$this->assertEquals('2', $letterA->resolve());

		$letterB = new Celular('B');
		$this->assertEquals('22', $letterB->resolve());

		$letterD = new Celular('D');
		$this->assertEquals('3', $letterD->resolve());

		$letterSpace = new Celular(' ');
		$this->assertEquals('0', $letterSpace->resolve());

		$letterZ = new Celular('Z');
		$this->assertEquals('9999', $letterZ->resolve());

		$letterC = new Celular('C');
		$this->assertEquals('222', $letterC->resolve());
	}

	public function testTwoLetterSameGroup() {
		$letterADG = new Celular('ADG');
		$this->assertEquals('234', $letterADG->resolve());

		$letterADGA = new Celular('ADG A');
		$this->assertEquals('23402', $letterADGA->resolve());
	}

	public function testTwoLetterDifferentGroup() {
		$letterAAA = new Celular('AAA');
		$this->assertEquals('2_2_2', $letterAAA->resolve());
	}

	public function testPhase() {
		$letter = new Celular('ALVINHO MONOPOLIZADOR MASTER');
		$this->assertEquals('2555888444664466606_666_66_66676665554449999236667770627777833777', $letter->resolve());
	}

}

?>
