<?php
namespace PackageFactory\AtomicFusion\Forms\Domain\Service;

/**
 * This file is part of the PackageFactory.AtomicFusion.Forms package
 *
 * (c) 2016 Wilhelm Behncke <wilhelm.behncke@googlemail.com>
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Validation\ValidatorResolver as FlowValidatorResolver;
use TYPO3\Flow\Validation\Validators\ValidatorInterface;
use PackageFactory\AtomicFusion\Forms\Domain\Model\Definition\ValidatorDefinitionInterface;
use PackageFactory\AtomicFusion\Forms\Domain\Exception\ResolverException;

/**
 * @Flow\Scope("singleton")
 */
class ValidatorResolver implements ValidatorResolverInterface
{
    /**
     * @Flow\Inject
     * @var FlowValidatorResolver
     */
    protected $flowValidatorResolver;

    /**
     * @inheritdoc
     */
    public function resolve(ValidatorDefinitionInterface $validatorDefinition)
    {
        try {
            return $this->flowValidatorResolver->createValidator(
                $validatorDefinition->getImplementationClassName(),
                $validatorDefinition->getOptions()
            );
        } catch (\Exception $e) {
            throw new ResolverException(
                sprintf('Error in ValidatorResolver: %s', $e->getMessage()),
                1476602082,
                $e
            );
        }
    }
}