<?php declare(strict_types = 1);

namespace SlevomatEET;

class FormatterTest extends \PHPUnit\Framework\TestCase
{

	/**
	 * @dataProvider dataTestFormatAmount
	 * @param int|null $value
	 * @param string|null $expected
	 */
	public function testFormatAmount(int $value = null, string $expected = null)
	{
		$this->assertSame($expected, Formatter::formatAmount($value));
	}

	public function dataTestFormatAmount(): array
	{
		return [
			[0, '0.00'],
			[10000, '100.00'],
			[150, '1.50'],
			[-5500, '-55.00'],
			[-12425, '-124.25'],
			[-12420, '-124.20'],
			[null, null],
		];
	}

	/**
	 * @dataProvider dataTestFormatDateTime
	 * @param \DateTimeImmutable $value
	 * @param string $expected
	 */
	public function testFormatDateTime(\DateTimeImmutable $value, string $expected)
	{
		$this->assertSame($expected, Formatter::formatDateTime($value));
	}

	public function dataTestFormatDateTime()
	{
		return [
			[new \DateTimeImmutable('2016-03-11 11:05:00', new \DateTimeZone('Europe/Prague')), '2016-03-11T11:05:00+01:00'],
			[new \DateTimeImmutable('2016-08-11 11:05:00', new \DateTimeZone('Europe/Prague')), '2016-08-11T11:05:00+02:00'],
		];
	}

}
