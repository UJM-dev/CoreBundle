<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Entity\Widget;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Claroline\CoreBundle\Repository\WidgetRepository")
 * @ORM\Table(name="claro_widget")
 */
class Widget
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(
     *     targetEntity="Claroline\CoreBundle\Entity\Plugin",
     *     cascade={"persist"}
     * )
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $plugin;

    /**
     * @ORM\Column(unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="is_configurable", type="boolean")
     */
    protected $isConfigurable;

    /**
     * @ORM\Column(name="is_exportable", type="boolean")
     */
    protected $isExportable;

    /**
     * @ORM\Column(name="is_displayable_in_workspace", type="boolean")
     */
    protected $isDisplayableInWorkspace = true;

    /**
     * @ORM\Column(name="is_displayable_in_desktop", type="boolean")
     */
    protected $isDisplayableInDesktop = true;

    /**
     * @ORM\Column(name="default_width", type="integer", options={"default":4})
     */
    protected $defaultWidth = 4;

    /**
     * @ORM\Column(name="default_height", type="integer", options={"default":3})
     */
    protected $defaultHeight = 3;

    public function getId()
    {
        return $this->id;
    }

    public function setPlugin($plugin)
    {
        $this->plugin = $plugin;
    }

    public function getPlugin()
    {
        return $this->plugin;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isConfigurable()
    {
        return $this->isConfigurable;
    }

    public function setConfigurable($bool)
    {
        $this->isConfigurable = $bool;
    }

    public function setExportable($isExportable)
    {
        $this->isExportable = $isExportable;
    }

    public function isExportable()
    {
        return $this->isExportable;
    }

    public function isDisplayableInWorkspace()
    {
        return $this->isDisplayableInWorkspace;
    }

    public function setDisplayableInWorkspace($bool)
    {
        $this->isDisplayableInWorkspace = $bool;
    }

    public function isDisplayableInDesktop()
    {
        return $this->isDisplayableInDesktop;
    }

    public function setDisplayableInDesktop($bool)
    {
        $this->isDisplayableInDesktop = $bool;
    }

    public function getDefaultWidth()
    {
        return $this->defaultWidth;
    }

    public function setDefaultWidth($defaultWidth)
    {
        $this->defaultWidth = $defaultWidth;
    }

    public function getDefaultHeight()
    {
        return $this->defaultHeight;
    }

    public function setDefaultHeight($defaultHeight)
    {
        $this->defaultHeight = $defaultHeight;
    }

    public function __toString()
    {
        return $this->name;
    }
}
