<?php

namespace Tutorial\HangN\Api\Data;

interface FaqInterface
{
    const ENTITY_ID = 'faq_id';
    const TITLE = 'title';
    const CONTENT = 'description';
    const IS_ACTIVE = 'status';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';


    public function getEntityId();

    public function setEntityId($entityId);

 
    public function getTitle();

    public function setTitle($title);


    public function getContent();


    public function setContent($content);


    public function getIsActive();

    public function setIsActive($isActive);

    public function getUpdateTime();


    public function setUpdateTime($updateTime);


    public function getCreatedAt();


    public function setCreatedAt($createdAt);
}