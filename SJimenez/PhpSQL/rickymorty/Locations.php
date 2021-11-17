<?php
class Locations
{

    private $id;
    private $name;
    private $type;
    private $dimensions;
    private $created;
    private $residents;

    /**
     * @param $id
     * @param $name
     * @param $type
     * @param $dimensions
     * @param $created
     * @param $residents
     */
    public function __construct($id, $name, $type, $dimensions, $created, array $residents)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->dimensions = $dimensions;
        $this->created = $created;
        $this->residents = $residents;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @param mixed $dimensions
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return array
     */
    public function getResidents()
    {
        return $this->residents;
    }

    /**
     * @param array $residents
     */
    public function setResidents($residents)
    {
        $this->residents = $residents;
    }


}

?>