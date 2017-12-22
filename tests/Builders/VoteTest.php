<?php

declare(strict_types=1);

/*
 * This file is part of Ark PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Ark\Builders;

use BrianFaust\Tests\Ark\TestCase;

/**
 * @coversNothing
 */
class VoteTest extends TestCase
{
    /** @test */
    public function can_create_signed_vote_transaction_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->builder('Vote')->create($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }

    /** @test */
    public function can_create_signed_unvote_transaction_object()
    {
        // Skip...
        $this->markTestSkipped('This requires secrets and will only be tested on local machines.');

        // Arrange...
        $secret = env('ARK_TESTING_SECRET');
        $delegate = '032fcfd19f0e095bf46bd3ada87e283720c405249b1be1a70bad1d5f20095a8515';
        $secondSecret = env('ARK_TESTING_SECOND_SECRET');

        // Act...
        $response = $this->getClient()->builder('Vote')->delete($secret, $delegate, $secondSecret);

        // Assert...
        $this->assertInstanceOf('stdClass', $response);
    }
}
