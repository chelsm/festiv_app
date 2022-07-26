<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsFixture
 */
class PostsFixture extends TestFixture
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
                'created' => '2022-07-20 21:09:28',
                'modified' => '2022-07-20 21:09:28',
                'content' => 'Lorem ipsum dolor sit amet',
                'description' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
