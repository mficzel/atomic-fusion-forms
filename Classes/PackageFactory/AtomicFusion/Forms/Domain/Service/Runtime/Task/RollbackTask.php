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
use PackageFactory\AtomicFusion\Forms\Domain\Service\Resolver\ProcessorResolverInterface;
/**
 * Rollback side effects if something went wrong during processing or validation
 *
 * @Flow\Scope("singleton")
 */
class RollbackTask implements RollbackTaskInterface
{
    /**
     * @Flow\Inject
     * @var ProcessorResolverInterface
     */
    protected $processorResolver;

    /**
     * @inheritdoc
     */
    public function run(
        PropertyMappingConfiguration $propertyMappingConfiguration,
        FieldDefinitionInterface $fieldDefinition,
        $input,
        $value,
        Result $validationResult
    )
    {
        $processor = $this->processorResolver->resolve($fieldDefinition->getProcessorDefinition());

        $processor->rollback(
            $propertyMappingConfiguration->forProperty($fieldDefinition->getName()),
            $validationResult->forProperty($fieldDefinition->getName()),
            $fieldDefinition,
            $fieldDefinition->getProcessorDefinition()->getOptions(),
            $input,
            $value
        );
    }
}
