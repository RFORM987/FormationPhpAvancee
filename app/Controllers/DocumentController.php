<?php

namespace App\Controllers;

use App\Entities\Document;
use App\Models\DocumentModel;

class DocumentController extends BaseController
{

    protected DocumentModel $docmodel;

    public function __construct($model = null){
        if ($model != null){$this->docmodel = $model;}
        else{$this->docmodel = new DocumentModel;}
    }

    public function list(): string
    {
        $docs = $this->docmodel->findAll();
        return view('Document/list.php', ['message' => session()->getFlashdata('message'),'docs' => $docs]);
    }

    public function create(){

        return view('Document/create.php');
    }

    public function display($id){
        $doc = $this->docmodel->find($id);
        //dd($doc,$doc->getTitle());
        return view('Document/display.php',['doc' => $doc]);
    }

    public function edit($id){
        $doc = $this->docmodel->find($id);
        return view('Document/edit.php',['doc' => $doc]);
    }

    public function save(){
        $data = $this->request->getPost();
        if(isset($data['id'])){
            $edit = $this->docmodel->find($data['id']);
            $edit->setTitle($data['title']);
            $edit->setContent($data['content']);
            $edit->setAccess($data['access']);
            $edit->setAbstract($data['abstract']);
            $this->docmodel->save($edit);
        }
        else{
            $new = new Document();
            $new->setTitle($data['title']);
            $new->setContent($data['content']);
            $new->setAbstract($data['abstract']);
            $new->setAccess();
            $this->docmodel->save($new);
        }
        //dd(site_url('/document/list'));
        return redirect()->to(site_url('/document/list'))->with('message','Document saved successfully');
    }

    public function delete(){
        $id = $this->request->getPost()['id'];

        try{$this->docmodel->delete($id);}
        catch(\Exception $e){
            return redirect()->to(site_url('/document/list'));
        }
        return redirect()->to(site_url('/document/list'))->with('message','Document deleted successfully');
    }
}