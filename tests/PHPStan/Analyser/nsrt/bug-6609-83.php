<?php // lint >= 8.3

namespace Bug6609Php83;

use function PHPStan\Testing\assertType;

class Foo
{

	/**
	 * This method should return the same type as a parameter passed.
	 *
	 * @template T of \DateTime|\DateTimeImmutable
	 *
	 * @param T $date
	 *
	 * @return T
	 */
	function modify(\DateTimeInterface $date) {
		$date = $date->modify('+1 day');
		assertType('T of DateTime|DateTimeImmutable (method Bug6609Php83\Foo::modify(), argument)', $date);

		return $date;
	}

	/**
	 * This method should return the same type as a parameter passed.
	 *
	 * @template T of \DateTime|\DateTimeImmutable
	 *
	 * @param T $date
	 *
	 * @return T
	 */
	function modify2(\DateTimeInterface $date) {
		$date = $date->modify('invalidd');
		assertType('*NEVER*', $date);

		return $date;
	}

	/**
	 * This method should return the same type as a parameter passed.
	 *
	 * @template T of \DateTime|\DateTimeImmutable
	 *
	 * @param T $date
	 *
	 * @return T
	 */
	function modify3(\DateTimeInterface $date, string $s) {
		$date = $date->modify($s);
		assertType('T of DateTime|DateTimeImmutable (method Bug6609Php83\Foo::modify3(), argument)', $date);

		return $date;
	}

}
