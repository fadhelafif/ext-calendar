<?php
namespace Fisharebest\ExtCalendar;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * Test harness for the class ArabicCalendar
 *
 * @author    Greg Roach <fisharebest@gmail.com>
 * @copyright (c) 2014-2015 webtrees development team
 * @license   This program is free software: you can redistribute it and/or modify
 *            it under the terms of the GNU General Public License as published by
 *            the Free Software Foundation, either version 3 of the License, or
 *            (at your option) any later version.
 *
 *            This program is distributed in the hope that it will be useful,
 *            but WITHOUT ANY WARRANTY; without even the implied warranty of
 *            MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *            GNU General Public License for more details.
 *
 *            You should have received a copy of the GNU General Public License
 *            along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
class ArabicCalendarTest extends TestCase {
	/**
	 * Create the shim functions, so we can run tests on servers which do
	 * not have the ext/calendar library installed.  For example HHVM.
	 *
	 * @return void
	 */
	public function setUp() {
		Shim::create();
	}

	/**
	 * Test the class constants.
	 *
	 * @coversNone
	 *
	 * @return void
	 */
	public function testConstants() {
		$calendar = new ArabicCalendar;

		$this->assertSame('@#DHIJRI@', $calendar->gedcomCalendarEscape());
		$this->assertSame(1948440, $calendar->jdStart());
		$this->assertSame(PHP_INT_MAX, $calendar->jdEnd());
		$this->assertSame(7, $calendar->daysInWeek());
		$this->assertSame(12, $calendar->monthsInYear());
	}

	/**
	 * Test the leap year calculations.
	 *
	 * @covers Fisharebest\ExtCalendar\ArabicCalendar::isLeapYear
	 *
	 * @return void
	 */
	public function testIsLeapYear() {
		$arabic = new ArabicCalendar;

		$this->assertSame($arabic->isLeapYear(1201), false);
		$this->assertSame($arabic->isLeapYear(1202), true);
		$this->assertSame($arabic->isLeapYear(1203), false);
		$this->assertSame($arabic->isLeapYear(1204), false);
		$this->assertSame($arabic->isLeapYear(1205), true);
		$this->assertSame($arabic->isLeapYear(1206), false);
		$this->assertSame($arabic->isLeapYear(1207), true);
		$this->assertSame($arabic->isLeapYear(1208), false);
		$this->assertSame($arabic->isLeapYear(1209), false);
		$this->assertSame($arabic->isLeapYear(1210), true);
		$this->assertSame($arabic->isLeapYear(1211), false);
		$this->assertSame($arabic->isLeapYear(1212), false);
		$this->assertSame($arabic->isLeapYear(1213), true);
		$this->assertSame($arabic->isLeapYear(1214), false);
		$this->assertSame($arabic->isLeapYear(1215), false);
		$this->assertSame($arabic->isLeapYear(1216), true);
		$this->assertSame($arabic->isLeapYear(1217), false);
		$this->assertSame($arabic->isLeapYear(1218), true);
		$this->assertSame($arabic->isLeapYear(1219), false);
		$this->assertSame($arabic->isLeapYear(1220), false);
		$this->assertSame($arabic->isLeapYear(1221), true);
		$this->assertSame($arabic->isLeapYear(1222), false);
		$this->assertSame($arabic->isLeapYear(1223), false);
		$this->assertSame($arabic->isLeapYear(1224), true);
		$this->assertSame($arabic->isLeapYear(1225), false);
		$this->assertSame($arabic->isLeapYear(1226), true);
		$this->assertSame($arabic->isLeapYear(1227), false);
		$this->assertSame($arabic->isLeapYear(1228), false);
		$this->assertSame($arabic->isLeapYear(1229), true);
		$this->assertSame($arabic->isLeapYear(1230), false);
	}

	/**
	 * Test the calculation of the number of days in each month.
	 *
	 * @covers \Fisharebest\ExtCalendar\ArabicCalendar::daysInMonth
	 *
	 * @return void
	 */
	public function testDaysInMonth() {
		$arabic = new ArabicCalendar;

		$this->assertSame($arabic->daysInMonth(1201, 1), 30);
		$this->assertSame($arabic->daysInMonth(1201, 2), 28);
		$this->assertSame($arabic->daysInMonth(1201, 3), 30);
		$this->assertSame($arabic->daysInMonth(1201, 4), 29);
		$this->assertSame($arabic->daysInMonth(1201, 5), 30);
		$this->assertSame($arabic->daysInMonth(1201, 6), 29);
		$this->assertSame($arabic->daysInMonth(1201, 7), 30);
		$this->assertSame($arabic->daysInMonth(1201, 8), 29);
		$this->assertSame($arabic->daysInMonth(1201, 9), 30);
		$this->assertSame($arabic->daysInMonth(1201, 10), 29);
		$this->assertSame($arabic->daysInMonth(1201, 11), 30);
		$this->assertSame($arabic->daysInMonth(1201, 12), 29);
		$this->assertSame($arabic->daysInMonth(1202, 1), 30);
		$this->assertSame($arabic->daysInMonth(1202, 2), 28);
		$this->assertSame($arabic->daysInMonth(1202, 3), 30);
		$this->assertSame($arabic->daysInMonth(1202, 4), 29);
		$this->assertSame($arabic->daysInMonth(1202, 5), 30);
		$this->assertSame($arabic->daysInMonth(1202, 6), 29);
		$this->assertSame($arabic->daysInMonth(1202, 7), 30);
		$this->assertSame($arabic->daysInMonth(1202, 8), 29);
		$this->assertSame($arabic->daysInMonth(1202, 9), 30);
		$this->assertSame($arabic->daysInMonth(1202, 10), 29);
		$this->assertSame($arabic->daysInMonth(1202, 11), 30);
		$this->assertSame($arabic->daysInMonth(1202, 12), 30);
	}

	/**
	 * Test the conversion of calendar dates into Julian days.
	 *
	 * @covers \Fisharebest\ExtCalendar\ArabicCalendar::jdToYmd
	 * @covers \Fisharebest\ExtCalendar\ArabicCalendar::ymdToJd
	 *
	 * @return void
	 */
	public function testYmdTojd() {
		$arabic = new ArabicCalendar;

		$this->assertSame($arabic->ymdToJd(1201, 1, 30), 2373708);
		$this->assertSame($arabic->jdToYmd(2373708), array(1201,1,30));
		$this->assertSame($arabic->ymdToJd(1201, 2, 28), 2373736);
		$this->assertSame($arabic->jdToYmd(2373736), array(1201,2,28));
		$this->assertSame($arabic->ymdToJd(1201, 3, 30), 2373767);
		$this->assertSame($arabic->jdToYmd(2373767), array(1201,3,30));
		$this->assertSame($arabic->ymdToJd(1201, 4, 29), 2373796);
		$this->assertSame($arabic->jdToYmd(2373796), array(1201,4,29));
		$this->assertSame($arabic->ymdToJd(1201, 5, 30), 2373826);
		$this->assertSame($arabic->jdToYmd(2373826), array(1201,5,30));
		$this->assertSame($arabic->ymdToJd(1201, 6, 29), 2373855);
		$this->assertSame($arabic->jdToYmd(2373855), array(1201,6,29));
		$this->assertSame($arabic->ymdToJd(1201, 7, 30), 2373885);
		$this->assertSame($arabic->jdToYmd(2373885), array(1201,7,30));
		$this->assertSame($arabic->ymdToJd(1201, 8, 29), 2373914);
		$this->assertSame($arabic->jdToYmd(2373914), array(1201,8,29));
		$this->assertSame($arabic->ymdToJd(1201, 9, 30), 2373944);
		$this->assertSame($arabic->jdToYmd(2373944), array(1201,9,30));
		$this->assertSame($arabic->ymdToJd(1201, 10, 29), 2373973);
		$this->assertSame($arabic->jdToYmd(2373973), array(1201,10,29));
		$this->assertSame($arabic->ymdToJd(1201, 11, 30), 2374003);
		$this->assertSame($arabic->jdToYmd(2374003), array(1201,11,30));
		$this->assertSame($arabic->ymdToJd(1201, 12, 29), 2374032);
		$this->assertSame($arabic->jdToYmd(2374032), array(1201,12,29));
		$this->assertSame($arabic->ymdToJd(1202, 1, 30), 2374062);
		$this->assertSame($arabic->jdToYmd(2374062), array(1202,1,30));
		$this->assertSame($arabic->ymdToJd(1202, 2, 28), 2374090);
		$this->assertSame($arabic->jdToYmd(2374090), array(1202,2,28));
		$this->assertSame($arabic->ymdToJd(1202, 3, 30), 2374121);
		$this->assertSame($arabic->jdToYmd(2374121), array(1202,3,30));
		$this->assertSame($arabic->ymdToJd(1202, 4, 29), 2374150);
		$this->assertSame($arabic->jdToYmd(2374150), array(1202,4,29));
		$this->assertSame($arabic->ymdToJd(1202, 5, 30), 2374180);
		$this->assertSame($arabic->jdToYmd(2374180), array(1202,5,30));
		$this->assertSame($arabic->ymdToJd(1202, 6, 29), 2374209);
		$this->assertSame($arabic->jdToYmd(2374209), array(1202,6,29));
		$this->assertSame($arabic->ymdToJd(1202, 7, 30), 2374239);
		$this->assertSame($arabic->jdToYmd(2374239), array(1202,7,30));
		$this->assertSame($arabic->ymdToJd(1202, 8, 29), 2374268);
		$this->assertSame($arabic->jdToYmd(2374268), array(1202,8,29));
		$this->assertSame($arabic->ymdToJd(1202, 9, 30), 2374298);
		$this->assertSame($arabic->jdToYmd(2374298), array(1202,9,30));
		$this->assertSame($arabic->ymdToJd(1202, 10, 29), 2374327);
		$this->assertSame($arabic->jdToYmd(2374327), array(1202,10,29));
		$this->assertSame($arabic->ymdToJd(1202, 11, 30), 2374357);
		$this->assertSame($arabic->jdToYmd(2374357), array(1202,11,30));
		$this->assertSame($arabic->ymdToJd(1202, 12, 30), 2374387);
		$this->assertSame($arabic->jdToYmd(2374387), array(1202,12,30));
	}
}
