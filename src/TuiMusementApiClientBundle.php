<?php

declare(strict_types=1);

namespace Tui\Musement\ApiClient;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Tui\Musement\ApiClient\DependencyInjection\TuiMusementApiClientExtension;

class TuiMusementApiClientBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TuiMusementApiClientExtension();
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
