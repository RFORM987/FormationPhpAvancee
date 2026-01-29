<?php

namespace Tests\App\Models;

use App\Models\DocumentModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class DocumentModelTest extends CIUnitTestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new DocumentModel();
    }

    /** @test */
    public function it_inserts_a_document()
    {
        $data = [
            'title'    => 'Document de test',
            'abstract' => '<p>Résumé du document</p>',
            'access'   => 'public',
        ];

        $id = $this->model->insert($data);

        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }

    /** @test */
    public function it_finds_a_document_by_id()
    {
        $id = $this->model->insert([
            'title'    => 'Doc trouvé',
            'abstract' => 'Test',
            'access'   => 'private',
        ]);

        $doc = $this->model->find($id);

        $this->assertNotNull($doc);
        $this->assertInstanceOf(\App\Entities\Document::class, $doc);
        $this->assertEquals('Doc trouvé', $doc->getTitle());
    }

    /** @test */
    public function it_updates_a_document()
    {
        $id = $this->model->insert([
            'title'    => 'Ancien titre',
            'abstract' => 'Test',
            'access'   => 'public',
        ]);

        $this->model->update($id, [
            'title' => 'Nouveau titre',
        ]);

        $doc = $this->model->find($id);

        $this->assertEquals('Nouveau titre', $doc->getTitle());
    }

    /** @test */
    public function it_deletes_a_document()
    {
        $id = $this->model->insert([
            'title'    => 'À supprimer',
            'abstract' => 'Test',
            'access'   => 'public',
        ]);

        $this->model->delete($id);

        $doc = $this->model->find($id);

        $this->assertNull($doc);
    }

    /** @test */
    public function it_does_not_allow_invalid_fields()
    {
        $id = $this->model->insert([
            'title'       => 'Test',
            'abstract'    => 'Test',
            'access'      => 'public',
            'fake_field'  => 'hack',
        ]);

        $doc = $this->model->find($id);

        $this->assertFalse(property_exists($doc, 'fake_field'));
    }

    protected function tearDown(): void
    {
        $db = \Config\Database::connect('tests');
        $db->table('document')->truncate();

        parent::tearDown();
    }
}