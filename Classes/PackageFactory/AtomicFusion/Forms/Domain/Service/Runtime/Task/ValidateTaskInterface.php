<?php
namespace PackageFactory\AtomicFusion\Forms\Domain\Service\Runtime\Task;

/**
 * This file is part of the PackageFactory.AtomicFusion.Forms package
 *
 * (c) 2016 Wilhelm Behncke <wilhelm.behncke@googlemail.com>
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Error\Messages\Result;
use PackageFactory\AtomicFusion\Forms\Domain\Model\Definition\FieldDefinitionInterface;

/**
 * Method definitions for the validate task
 */
interface ValidateTaskInterface
{
    /**
     * Validate the given values by their field definitions and write possibly occuring messages
     * to the given validation result
     *
     * @param FieldDefinitionInterface $fieldDefinition
     * @param mixed $value
     * @param Result $validationResult
     * @return void
     */
    public function run(FieldDefinitionInterface $fieldDefinition, $value, Result $validationResult);
}
