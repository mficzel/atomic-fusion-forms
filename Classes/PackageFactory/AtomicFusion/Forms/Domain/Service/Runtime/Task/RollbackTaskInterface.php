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
use Neos\Flow\Property\PropertyMappingConfiguration;
use PackageFactory\AtomicFusion\Forms\Domain\Model\Definition\FieldDefinitionInterface;

/**
 * Method definitions for rollback task
 */
interface RollbackTaskInterface
{
    /**
     * Perform rollback actions, in case something went wrong during processing or validation
     *
     * @param PropertyMappingConfiguration $propertyMappingConfiguration
     * @param FieldDefinitionInterface $fieldDefinition
     * @param mixed $input
     * @param mixed $value
     * @param Result $validationResult
     * @return void
     */
    public function run(
        PropertyMappingConfiguration $propertyMappingConfiguration,
        FieldDefinitionInterface $fieldDefinition,
        $input,
        $value,
        Result $validationResult
    );
}
