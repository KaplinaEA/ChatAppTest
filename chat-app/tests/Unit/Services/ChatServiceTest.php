<?php

namespace Services;

use App\Helpers\Dto\Request\CursorDto;
use App\Models\Chat;
use App\Repository\ChatRepository;
use App\Services\ChatService;
use Illuminate\Database\Eloquent\Builder;
use Tests\TestCase;

class ChatServiceTest extends TestCase
{
    public function test_it_returns_chat_list(): void
    {
        $cursorDto = $this->createMock(CursorDto::class);
        $chatRepository = $this->createMock(ChatRepository::class);
        $expectedCollection = collect(
            Chat::factory()->count(25)->create()
        );

        $mockQueryBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['get'])
            ->getMock();

        $mockQueryBuilder->expects($this->once())
            ->method('get')
            ->willReturn($expectedCollection);

        $chatRepository->expects($this->once())
            ->method('list')
            ->with($cursorDto)
            ->willReturn($mockQueryBuilder);


        $service = new ChatService($chatRepository);
        $result = $service->getlist($cursorDto);

        $this->assertSame($expectedCollection, $result);
    }
}
