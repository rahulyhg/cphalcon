<?php
declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalconphp.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Test\Unit\Filter\Sanitize;

use Codeception\Example;
use Phalcon\Filter\Sanitize\Email;
use UnitTester;

/**
 * Class EmailCest
 */
class EmailCest
{
    /**
     * Tests Phalcon\Filter\Sanitize\Email :: __invoke()
     *
     * @dataProvider getData
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalconphp.com>
     * @since        2018-11-13
     */
    public function filterSanitizeEmailInvoke(UnitTester $I, Example $example)
    {
        $I->wantToTest('Filter\Sanitize\Email - __invoke()');

        $sanitizer = new Email();

        $actual = $sanitizer($example[0]);
        $I->assertEquals($example[1], $actual);
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        return [
            ['some(one)@exa\\mple.com', 'someone@example.com'],
            [
                '!(first.guy)
                    @*my-domain**##.com.rx//', '!first.guy@*my-domain**##.com.rx',
            ],
        ];
    }
}
