<?php

/**
 * This file is part of symforium
 *
 * (c) Aaron Scherer <aequasi@gmail.com>
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 */

namespace Symforium\Web;

use Aequasi\Environment\Environment;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symforium\Core\Kernel as SymforiumKernel;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 */
class Kernel extends SymforiumKernel
{
    /**
     * {@inheritDoc}
     */
    public function initialize(Environment $environment)
    {
        parent::initialize($environment);

        if (!file_exists(__DIR__.'/config/parameters.yml')) {
            touch(__DIR__.'/config/parameters.yml');
        }
    }

    /**
     * @param LoaderInterface $loader
     *
     * @return mixed
     */
    public function registerSymforiumConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/../app/config/config_'.$this->environment.'.yml');
    }
}
 