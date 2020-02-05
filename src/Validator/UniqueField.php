<?php


namespace App\Validator;


use Doctrine\Common\Annotations\Annotation\Target;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY"})
 */
class UniqueField extends Constraint
{
    public $message = 'This is a duplicate';
    public $entity;
    public $property;
}
