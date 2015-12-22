<?php

namespace CuteNinja\PersonaBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class CuteNinjaPersonaBundle
 *
 * @package CuteNinja\PersonaBundle
 */
class CuteNinjaPersonaBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }
}
