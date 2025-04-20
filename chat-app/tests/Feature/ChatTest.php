<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ChatTest extends TestCase
{
    /**
     * @dataProvider listChat
     */
    public function test_the_list_chat(array $query, int $expectedStatus): void
    {
        $route = route('chats.list', $query);
        $response = $this->getJson($route);
        $response->assertStatus($expectedStatus);
        if ($expectedStatus === Response::HTTP_OK) {
            $response->assertJsonStructure([
                'data' => [
                    'chats' => [
                        '*' => [
                            'id',
                            'createdAt',
                            'updatedAt',
                            'lastMessage',
                        ],
                    ],
                    'nextPage' => [
                        'key',
                        'date',
                    ],
                ],
            ]);
        }
    }

    public static function listChat(): array
    {
        return [
            [
                'query' => [],
                'expectedStatus' => Response::HTTP_OK,
            ],
            [
                'query' => ['limit' => 10],
                'expectedStatus' => Response::HTTP_OK,
            ],
            [
                'query' => ['date' => '2025-04-20 14:58:44', 'key' => '019653b4-ff8d-7381-813a-2299f7a81313'],
                'expectedStatus' => Response::HTTP_OK,
            ],
            [
                'query' => ['key' => '019653b4-ff8d-7381-813a-2299f7a81313'],
                'expectedStatus' => Response::HTTP_BAD_REQUEST,
            ],
            [
                'query' => ['date' => '2020-02-02 10:00:00'],
                'expectedStatus' => Response::HTTP_BAD_REQUEST,
            ],
            [
                'query' => ['date' => '2020-02-02hhh10:00:00', 'key' => '019653b4-ff8d-7381-813a-2299f7a81313'],
                'expectedStatus' => Response::HTTP_BAD_REQUEST,
            ],
        ];
    }
}
