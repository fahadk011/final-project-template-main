<?php

namespace app\models;

use app\models\TypeConverter;

class ExperienceModel extends Model {

    private $id;
    private $title;
    private $designation;
    private $location;
    private $date_join;
    private $date_leave;
    private $description;

    // Constructor
    public function __construct() {
        parent::__construct("experiences");
    }

    // Getter and Setter for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for title
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    // Getter and Setter for designation
    public function getDesignation() {
        return $this->designation;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    // Getter and Setter for location
    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    // Getter and Setter for date_join
    public function getDateJoin() {
        return $this->date_join;
    }

    public function setDateJoin($date_join) {
        $this->date_join = $date_join;
    }

    // Getter and Setter for date_leave
    public function getDateLeave() {
        return $this->date_leave;
    }

    public function setDateLeave($date_leave) {
        $this->date_leave = $date_leave;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    // Method for inserting into the database (returns associative array of values)
    protected function get_insert_name_value() {
        return array(
            'title' => $this->title,
            'designation' => $this->designation,
            'location' => $this->location,
            'date_join' => TypeConverter::fromDateTime($this->date_join, TypeConverter::ISO_DATE),
            'date_leave' => TypeConverter::fromDateTime($this->date_leave, TypeConverter::ISO_DATE)
        );
    }

    // Method for setting the inserted ID
    protected function set_inserted_id($id) {
        $this->id = $id;
    }


    protected function create_model_from_result_array($result) {
        $model = new ExperienceModel();
        $model->setId($result['id']);
        $model->setTitle($result['title']);
        $model->setDesignation($result['designation']);
        $model->setLocation($result['location']);
        $model->setDescription($result['description']);
        $model->setDateJoin(TypeConverter::toDateTime($result['date_join'], TypeConverter::ISO_DATE));
        $model->setDateLeave(TypeConverter::toDateTime($result['date_leave'], TypeConverter::ISO_DATE));
        return $model;
    }
}
