<?php

namespace Tests\App\Controllers;

use App\Controllers\DocumentController;
use App\Entities\Document;
use App\Models\DocumentModel;
use CodeIgniter\Test\CIUnitTestCase;

class DocumentControllerTest extends CIUnitTestCase
{
    public function test_list_returns_documents_from_model()
    {
        $doc1 = new Document([
            'title' => 'Documentpourtester',
            'abstract' => 'Voila',
            'content' => '.',
        ]);

        $doc2 = new Document([
            'title' => 'Documentpourtesteraussi',
            'abstract' => 'Encore',
            'content' => '..',
        ]);

        $mockModel = $this->createMock(DocumentModel::class);

        $mockModel->expects($this->once())
                  ->method('findAll')
                  ->willReturn([$doc1, $doc2]);

        $controller = new DocumentController($mockModel);

        $result = $controller->list();

        $this->assertIsString($result);
        $this->assertStringContainsString('Documentpourtester', $result);
        $this->assertStringContainsString('Documentpourtesteraussi', $result);
    }
}