<?php

namespace oShop\Models;

/**
 * Cette classe, CoreModel, n'est pas là pour "représenter" une table
 * en base de donnée.
 * Son seul et unique but est bien d'être étendue (extends...)
 * Il est donc "acté" que cette classe ne sera jamais instanciée
 * Nous n'aurons jamais besoin de faire un new CoreModel.
 * C'est ainsi et PHP accepte bien cette idée là !
 */
class CoreModel
{
    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}