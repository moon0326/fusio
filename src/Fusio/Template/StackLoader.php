<?php
/*
 * Fusio
 * A web-application to create dynamically RESTful APIs
 *
 * Copyright (C) 2015 Christoph Kappestein <k42b3.x@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Fusio\Template;

use Twig_LoaderInterface;

/**
 * StackLoader
 *
 * @author  Christoph Kappestein <k42b3.x@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0
 * @link    http://fusio-project.org
 */
class StackLoader implements Twig_LoaderInterface
{
    protected $source;
    protected $cacheKey;
    protected $lastModified;

    public function set($source, $cacheKey, $lastModified)
    {
        $this->source       = $source;
        $this->cacheKey     = $cacheKey;
        $this->lastModified = $lastModified;
    }

    public function getSource($name)
    {
        return $this->source;
    }

    public function getCacheKey($name)
    {
        return $this->cacheKey;
    }

    public function isFresh($name, $time)
    {
        return strtotime($this->lastModified) <= $time;
    }
}