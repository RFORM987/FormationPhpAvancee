<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Document extends Entity
{
    protected $attributes = [
        'id' => null,
        'title' => null,
        'abstract' => null,
        'content' => null,
        'access' => null,
        'type' => null
    ];

    public function __clone(): void
    {
        $this->attributes['id'] = null;
        $this->attributes['title'] = "Copie de : ".$this->title;
        $this->attributes['abstract'] = $this->abstract;
        $this->attributes['content'] = $this->content;
        $this->attributes['access'] = 'Restricted';
        $this->attributes['type'] = 'Copy';
    }

    public function getAbstract()
    {
        return $this->attributes['abstract'];
    }
    public function setAbstract($abstract)
    {
        $this->attributes['abstract'] = $abstract;

        return $this;
    }

    public function getAccess()
    {
        return $this->attributes['access'];
    }
    public function setAccess($access = 'Restricted')
    {
        if (!in_array($access,['Restricted','Internal','Public'])){
            throw new \Exception('Invalid access type on document');
        }
        $this->attributes['access'] = $access;

        return $this;
    }

    public function getContent()
    {
        return $this->attributes['content'];
    }
    public function setContent($content)
    {
        $this->attributes['content'] = $content;

        return $this;
    }

    public function getTitle()
    {
        return $this->attributes['title'];
    }

    public function setTitle($title)
    {
        $this->attributes['title'] = $title;

        return $this;
    }

    public function __toString()
    {
        if (in_array($this->access,['Internal','Public'])){
            return 'Titre : '.$this->title.
            '<br> Résumé :'.$this->abstract.
            '<br> Contenu :'.$this->content;
        }
        else{
            return 'Document en accès restreint.';
        }
    }
    
    public function getType()
    {
        return $this->attributes['type'];
    }

    public function getId()
    {
        return $this->attributes['id'];
    }
}