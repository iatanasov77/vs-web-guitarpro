<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\CustomerGroup as BaseCustomerGroup;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_CustomerGroups")]
class CustomerGroup extends BaseCustomerGroup
{
}