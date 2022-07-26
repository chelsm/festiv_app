<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LikesFixture
 */
class LikesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created' => '2022-07-20 21:09:34',
                'modified' => '2022-07-20 21:09:34',
                'user_id' => 1,
                'post_id' => 1,
            ],
        ];
        parent::init();
    }
}
