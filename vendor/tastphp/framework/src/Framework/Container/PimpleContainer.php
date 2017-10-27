<?php

namespace TastPHP\Framework\Container;

/**
 * Class PimpleContainer
 * @package TastPHP\Framework\Container
 */
class PimpleContainer implements \Psr\Container\ContainerInterface
{
    /**
     * @var Container
     */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new NotFoundException(sprintf('Identifier "%s" is not defined in container.', $id));
        }
        return $this->container[$id];
    }

    /**
     * @param string $id
     * @return bool
     */
    public function has($id)
    {
        return isset($this->container[$id]);
    }
}
